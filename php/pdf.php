<?php

require('../fpdf/fpdf.php');
//include('con_bd.php');
$fechainicia=date('Y-m-d',strtotime($_POST['fechaInicia']));
$fechaFin= date('Y-m-d H:i:s',strtotime($_POST['fechaFin']));
//print_r($fechainicia);
//print_r($fechaFin);
//die();
///////////////////CONSULTA DE DATOS PARA REPORTE
        $search = $_SESSION['usuario'];
        $id= $_SESSION['inicio'];
        $j= (int) $id; 
//fecha desde 0 de hoy       
        $fecha_actual = date("d-m-Y H:i:s");
//fecha de documento
        $a= date("d-m-Y",strtotime($fechaFin."- 1 days"));
        

   // require ('con_bd.php');
   
   
//$mysqli->close();





class PDF extends FPDF
{
// Cabecera de página

function Header()
{
    // Logo
   // $this->Image('../img/logo.png',20,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $fecha_actual = date("d-m-Y H:i:s");
    $fecha_actual=date("d-m-Y H:i:s",strtotime($fecha_actual."- 7 Hours"));  
    $this->Cell(77,26,utf8_decode('Reporte del día '.$fecha_actual),1,0,'C');
    $this->Cell(20);
   
    // Salto de línea
    $this->Ln(50);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

//encabezado de la tabla
$pdf->SetFont('arial','B',14);
$pdf->SetFillColor(55,89,78);
$pdf->SetTextColor(255);
$pdf->Cell(35,7,'Identificador',1,0,'C',true);
$pdf->Cell(35,7,'Producto',1,0,'C',true);
$pdf->Cell(35,7,utf8_decode('Precio'),1,0,'C',true);
$pdf->Cell(35,7,utf8_decode('Cantidad'),1,0,'C',true);
$pdf->Cell(45,7,utf8_decode('Fecha venta'),1,0,'C',true);
$pdf->Ln(7);


//include("con_bd.php");
  // require ("con_bd.php");



for($i=1;$i<=40;$i++){
    $pdf->SetTextColor(0);
    $pdf->SetFillColor(224,235,255);
    $pdf->SetFont('arial','',12);
    $pdf->Ln(0);
    $pdf->Cell(35,7,utf8_decode('Cuidado tema').$i,1,0,false);
    $pdf->Cell(45,7,utf8_decode('Cuidado tema2').$i,1,0,false);
    $pdf->Cell(45,7,utf8_decode('Cuidado tema3').$i,1,0,false);
    $pdf->Cell(45,7,utf8_decode('Cuidado tema4').$i,1,1,false);
    $pdf->Cell(45,7,utf8_decode('Cuidado tema5').$i,1,1,false);
}
$pdf->Output('D','Reporte_Hoy_'.$a.".pdf");

?>