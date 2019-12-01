<?php error_reporting(0);

require('fpdf/fpdf.php');

//Conecto a la base de datos

include ('Conexion.php');
mysql_select_db("mercado", $conexion);
//Consulta la tabla productos solicitando todos los productos

$resultado = mysql_query("SELECT * FROM Usuarios", $conexion);

//Instaciamos la clase para genrear el documento pdf
$pdf=new FPDF();

//Agregamos la primera pagina al documento pdf
$pdf->AddPage();

//Seteamos el inicio del margen superior en 25 pixeles

$y_axis_initial = 25;

//Seteamos el tiupo de letra y creamos el titulo de la pagina. No es un encabezado no se repetira
$pdf->SetFont('Arial','B',12);

$pdf->Cell(40,6,'',0,0,'C');
$pdf->Cell(100,6,'LISTA DE PRODUCTOS',1,0,'C');

$pdf->Ln(10);

//Creamos las celdas para los titulo de cada columna y le asignamos un fondo gris y el tipo de letra
$pdf->SetFillColor(232,232,232);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(125,6,'Titulo',1,0,'C',1);

$pdf->Cell(30,6,'Precio',1,0,'C',1);
$pdf->Cell(30,6,'Foto',1,0,'C',1);

$pdf->Ln(10);

//Comienzo a crear las fiulas de productos según la consulta mysql

while($fila = mysql_fetch_array($resultado))
{

    $titulo = $fila['titulo'];

    $precio = $fila['precio'];
    $imagen="fotos/".$row['imagen1'];

   
    $pdf->Cell(125,15,$titulo,1,0,'L',0);

       $pdf->Cell(30,15,$precio,1,0,'R',1);
//Muestro la iamgen dentro de la celda GetX y GetY dan las coordenadas actuales de la fila

     $pdf->Cell( 30, 15, $pdf->Image($imagen, $pdf->GetX()+5, $pdf->GetY()+3, 20), 1, 0, 'C', false );

$pdf->Ln(15);

}

mysql_close($enlace);

//Mostramos el documento pdf
$pdf->Output();

?>