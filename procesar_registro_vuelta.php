<?php
require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero_coche = $_POST['numero_coche'];
    $hora_paso = $_POST['hora_paso'];

    // Obtener la última carrera
    $stmt = $pdo->query("SELECT id FROM carrera ORDER BY id DESC LIMIT 1");
    $carrera = $stmt->fetch();
    $carrera_id = $carrera['id'];

    // Obtener el coche por su número
    $stmt = $pdo->prepare("SELECT id, hora_salida FROM coche WHERE numero = ?");
    $stmt->execute([$numero_coche]);
    $coche = $stmt->fetch();

    if (!$coche) {
        echo "Error: No se encontró un coche con el número proporcionado";
        exit;
    }

    $coche_id = $coche['id'];
    $hora_salida = $coche['hora_salida'];

    // Obtener el número de vuelta actual
    $stmt = $pdo->prepare("SELECT COUNT(*) as vueltas FROM vuelta WHERE coche_id = ? AND carrera_id = ?");
    $stmt->execute([$coche_id, $carrera_id]);
    $result = $stmt->fetch();
    $numero_vuelta = $result['vueltas'] + 1;

    // Calcular tiempo de vuelta y tiempo acumulado
    $tiempo_vuelta = strtotime($hora_paso) - strtotime($hora_salida);
    $tiempo_vuelta = gmdate("H:i:s", $tiempo_vuelta);

    $stmt = $pdo->prepare("SELECT tiempo_acumulado FROM vuelta WHERE coche_id = ? AND carrera_id = ? ORDER BY id DESC LIMIT 1");
    $stmt->execute([$coche_id, $carrera_id]);
    $ultima_vuelta = $stmt->fetch();
    $tiempo_acumulado = $ultima_vuelta ? $ultima_vuelta['tiempo_acumulado'] : "00:00:00";

    $tiempo_acumulado = gmdate("H:i:s", strtotime($tiempo_acumulado) + strtotime($tiempo_vuelta) - strtotime("00:00:00"));

    // Calcular velocidad (asumiendo una longitud de circuito de 5 km)
    $longitud_circuito = 5; // km
    $tiempo_vuelta_segundos = strtotime($tiempo_vuelta) - strtotime("00:00:00");
    $velocidad = $longitud_circuito / ($tiempo_vuelta_segundos / 3600);

    $stmt = $pdo->prepare("INSERT INTO vuelta (carrera_id, coche_id, numero_vuelta, hora_paso, tiempo_vuelta, velocidad, tiempo_acumulado) VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    if ($stmt->execute([$carrera_id, $coche_id, $numero_vuelta, $hora_paso, $tiempo_vuelta, $velocidad, $tiempo_acumulado])) {
        echo "Vuelta registrada exitosamente";
    } else {
        echo "Error al registrar la vuelta";
    }
} else {
    echo "Método no permitido";
}