<?php
require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero = $_POST['numero'];
    $piloto = $_POST['piloto'];
    $copiloto = $_POST['copiloto'];
    $detalles_coche = $_POST['detalles_coche'];
    $hora_salida = $_POST['hora_salida'];

    $stmt = $pdo->prepare("INSERT INTO coche (numero, piloto, copiloto, detalles_coche, hora_salida) VALUES (?, ?, ?, ?, ?)");
    
    if ($stmt->execute([$numero, $piloto, $copiloto, $detalles_coche, $hora_salida])) {
        echo "Coche registrado exitosamente";
    } else {
        echo "Error al registrar el coche";
    }
}