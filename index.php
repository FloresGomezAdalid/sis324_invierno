<?php
require_once 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Control de Tiempo - Circuito Oscar Crespo</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Sistema de Control de Tiempo - Circuito Oscar Crespo</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#" id="nuevaCarreraBtn">Nueva Carrera</a></li>
            <li><a href="#" id="registroCocheBtn">Registrar Coche</a></li>
            <li><a href="#" id="registroVueltaBtn">Registrar Vuelta</a></li>
            <li><a href="#" id="verResultadosBtn">Ver Resultados</a></li>
        </ul>
    </nav>
    <main id="contenidoPrincipal">
        <!-- El contenido dinámico se cargará aquí -->
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
</body>
</html>