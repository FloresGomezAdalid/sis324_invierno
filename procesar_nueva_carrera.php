<?php
require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $total_vueltas = $_POST['total_vueltas'];
    $fecha = $_POST['fecha'];

    $stmt = $pdo->prepare("INSERT INTO carrera (total_vueltas, fecha) VALUES (?, ?)");
    
    if ($stmt->execute([$total_vueltas, $fecha])) {
        echo "Carrera creada exitosamente";
    } else {
        echo "Error al crear la carrera";
    }
}