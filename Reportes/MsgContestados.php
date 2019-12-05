<?php 
  include("compruebo.php");
?>
<?php
	require '../fpdf/fpdf.php';
    require '../Conexion.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('../img/logo3.png', 10, 10, 50 );
			$this->SetFont('Helvetica','B',18);
			$this->SetTextColor(184,10,10);
			$this->Cell(30);
			$this->Cell(120,10,utf8_decode("Mensajes Contestados"),0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
    }
    

    $query = "SELECT a.id_mensaje, a.nombre, a.apPat, a.apMat, a.correo, a.telefono, a.mensaje, a.f_enviado, a.f_respuesta, a.visto,
     a.usuario_id_usuario, b.idUsuario, b.nombre as n, b.apPat as ap, b.apMat as am FROM mensaje a, usuario b WHERE a.usuario_id_usuario = b.idUsuario";
	
    $resultado = mysqli_query($conexion, $query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
    $pdf->AddPage();
    
    while($row = $resultado->fetch_assoc()){
        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(20,5,utf8_decode("Id: " .$row['id_mensaje']),1,1,'L');

        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(95,6,'Autor ',1,0,'C',1);
        $pdf->Cell(95,6,'Datos de Contacto ',1,1,'C',1);
        $pdf->Cell(95,6,utf8_decode($row['nombre']." ".$row['apPat']." ".$row['apMat']),1,0,'C');
        $pdf->Cell(95,6,utf8_decode($row['correo']."  " . $row['telefono']),1,1,'C');
        $pdf->Cell(190,6,'Mensaje ',1,1,'L',1);
        $pdf->Cell(190,6,utf8_decode($row['mensaje']),1,1,'L');
        $pdf->Cell(110,6,utf8_decode('Respondió'),1,0,'C',1);
        $pdf->Cell(40,6,'Recibido',1,0,'C',1);
        $pdf->Cell(40,6,'Respuesta ',1,1,'C',1);
        $pdf->Cell(110,6,utf8_decode($row['n']." ".$row['ap']." ".$row['am']),1,0,'L');
        $pdf->Cell(40,6,utf8_decode($row['f_enviado']),1,0,'C');
        $pdf->Cell(40,6,utf8_decode($row['f_respuesta']),1,0,'C');

        $pdf->Ln();
        $pdf->Ln();
    }
    
	$pdf->Output();
?>