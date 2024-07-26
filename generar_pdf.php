<?php
require('fpdf.php');
require_once 'db_connection.php';

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial','B',15);
        $this->Cell(0,10,'Resultados de la Carrera - Circuito Oscar Crespo',0,1,'C');
        $this->Ln(10);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Página '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

// Encabezados de la tabla
$header = array('Vuelta', 'Coche', 'Piloto', 'Hora Salida', 'Hora Llegada', 'Tiempo Vuelta', 'Velocidad (km/h)', 'Tiempo Acumulado');
$w = array(15, 15, 35, 25, 25, 25, 30, 30);

for($i=0;$i<count($header);$i++)
    $pdf->Cell($w[$i],7,$header[$i],1,0,'C');
$pdf->Ln();

// Datos de la tabla
$stmt = $pdo->query("SELECT v.numero_vuelta, c.numero as numero_coche, c.piloto, c.hora_salida, v.hora_paso, v.tiempo_vuelta, v.velocidad, v.tiempo_acumulado 
                     FROM vuelta v 
                     JOIN coche c ON v.coche_id = c.id 
                     ORDER BY v.numero_vuelta, v.tiempo_vuelta");
$resultados = $stmt->fetchAll();

foreach($resultados as $row)
{
    $pdf->Cell($w[0],6,$row['numero_vuelta'],1);
    $pdf->Cell($w[1],6,$row['numero_coche'],1);
    $pdf->Cell($w[2],6,$row['piloto'],1);
    $pdf->Cell($w[3],6,$row['hora_salida'],1);
    $pdf->Cell($w[4],6,$row['hora_paso'],1);
    $pdf->Cell($w[5],6,$row['tiempo_vuelta'],1);
    $pdf->Cell($w[6],6,number_format($row['velocidad'], 2),1);
    $pdf->Cell($w[7],6,$row['tiempo_acumulado'],1);
    $pdf->Ln();
}

$pdf->Output('D', 'resultados_carrera.pdf');