<?php
require_once 'db_connection.php';

$stmt = $pdo->query("SELECT v.numero_vuelta, c.numero as numero_coche, c.piloto, c.hora_salida, v.hora_paso, v.tiempo_vuelta, v.velocidad, v.tiempo_acumulado 
                     FROM vuelta v 
                     JOIN coche c ON v.coche_id = c.id 
                     ORDER BY v.numero_vuelta, v.tiempo_vuelta");
$resultados = $stmt->fetchAll();
?>

<h2>Resultados de la Carrera</h2>
<table>
    <thead>
        <tr>
            <th>Vuelta</th>
            <th>Coche</th>
            <th>Piloto</th>
            <th>Hora Salida</th>
            <th>Hora Llegada</th>
            <th>Tiempo Vuelta</th>
            <th>Velocidad (km/h)</th>
            <th>Tiempo Acumulado</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($resultados as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['numero_vuelta']) ?></td>
            <td><?= htmlspecialchars($row['numero_coche']) ?></td>
            <td><?= htmlspecialchars($row['piloto']) ?></td>
            <td><?= htmlspecialchars($row['hora_salida']) ?></td>
            <td><?= htmlspecialchars($row['hora_paso']) ?></td>
            <td><?= htmlspecialchars($row['tiempo_vuelta']) ?></td>
            <td><?= htmlspecialchars($row['velocidad']) ?></td>
            <td><?= htmlspecialchars($row['tiempo_acumulado']) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>