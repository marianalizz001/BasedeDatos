<?php
	include 'plantilla.php';
    require '../Conexion.php';

    $id = $_REQUEST['idUsuario'];
    
    $query = "SELECT u.nombre, u.apPat, u.apMat, u.f_nac, u.genero, u.calle, u.no_ext, u.no_int, u.colonia, u.cp, u.correo,
     u.telefono, d.referido, d.mot_consulta, d.ult_consulta, d.contacto_emergencia_nombre, d.contacto_emergencia_apPat,
     d.contacto_emergencia_apMat, d.contacto_emergencia_num, d.ant_fam, d.ant_per_no_pat FROM Usuario u, Detalle_paciente d WHERE u.idUsuario = $id and u.idUsuario=d.Usuario_idUsuario";
	
    $resultado = mysqli_query($conexion, $query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
    $pdf->AddPage();
    
    while($row = $resultado->fetch_assoc()){

        $pdf->SetFillColor(232,232,232);
        $pdf->SetTextColor(21,70,97);
        $pdf->SetFont('Helvetica','B',12);
        $pdf->Cell(45,5,utf8_decode("DATOS PERSONALES"),0,1,'C');
        $pdf->Ln();

        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Arial','B',12);

        $pdf->Cell(50,6,'Nombre ',1,0,'C',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($row['nombre']." ".$row['apPat']." ". $row['apMat']),1,1,'C');

        $pdf->Cell(50,6,'Fecha de Nacimiento ',1,0,'C',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($row['f_nac']),1,1,'C');

        $pdf->Cell(50,6,'Genero ',1,0,'C',1);
        $pdf->SetFillColor(232,232,232);
        if ($row['genero'] == 'F') $pdf->Cell(140,6,utf8_decode('Femenino'),1,1,'C');
        if ($row['genero'] == 'M') $pdf->Cell(140,6,utf8_decode('Masculino'),1,1,'C');
        
        $pdf->Cell(50,6,'Correo ',1,0,'C',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($row['correo']),1,1,'C');

        $pdf->Cell(50,6,utf8_decode('Teléfono '),1,0,'C',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($row['telefono']),1,1,'C');

        $pdf->Cell(50,6,'Domicilio ',1,0,'C',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($row['calle']. " ". $row['no_ext']. "". $row['no_int']." ". $row['colonia']. " " . $row['cp']),1,1,'C');

        $pdf->Cell(50,6,utf8_decode('Referido por '),1,0,'C',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($row['referido']),1,1,'C');

        $pdf->Cell(50,6,utf8_decode('Motivo de consulta '),1,0,'C',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($row['mot_consulta']),1,1,'C');

        $pdf->Cell(50,6,utf8_decode('Última consulta dental'),1,0,'C',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($row['ult_consulta']),1,1,'C');

        $pdf->Cell(50,6,utf8_decode('Contacto emergencia'),1,0,'C',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($row['contacto_emergencia_nombre']. " ". $row['contacto_emergencia_apPat']. " ". $row['contacto_emergencia_apMat'] ." - ". $row['contacto_emergencia_num']),1,1,'C');
        
        $pdf->Ln();
        $pdf->SetFillColor(232,232,232);
        $pdf->SetTextColor(21,70,97);
        $pdf->SetFont('Helvetica','B',12);
        $pdf->Cell(82,5,utf8_decode("ANTECEDENTES HEREDO-FAMILIARES"),0,1,'C');
        $pdf->Ln();

        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Arial','B',12);

        $obj = json_decode($row['ant_fam']);

        $pdf->Cell(50,6,utf8_decode('Alergias'),1,0,'C',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'alergias'} == "Si"){
            if ($obj->{'a_padre'} == "Si")
                $pdf->Cell(47,6,utf8_decode("Padres: " . $obj->{'a_padre'}),1,0,'C');
            if ($obj->{'a_abuelo'} == "Si")
                $pdf->Cell(46,6,utf8_decode("Abuelos: " . $obj->{'a_abuelo'}),1,0,'C');
            if ($obj->{'a_hermanos'} == "Si")
                $pdf->Cell(47,6,utf8_decode("Hermanos: " . $obj->{'a_hermanos'}),1,0,'C');
            $pdf->Ln();
        }else
            $pdf->Cell(140,6,utf8_decode("No"),1,1,'C');

        $pdf->Cell(50,6,utf8_decode('Enf. Cardiológicas'),1,0,'C',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'cardiologicas'} == "Si"){
            if ($obj->{'card_padre'} == "Si")
                $pdf->Cell(47,6,utf8_decode("Padres: " . $obj->{'card_padre'}),1,0,'C');
            if ($obj->{'card_abuelo'} == "Si")
                $pdf->Cell(46,6,utf8_decode("Abuelos: " . $obj->{'card_abuelo'}),1,0,'C');
            if ($obj->{'card_hermanos'} == "Si")
                $pdf->Cell(47,6,utf8_decode("Hermanos: " . $obj->{'card_hermanos'}),1,0,'C');
            $pdf->Ln();
        }else
            $pdf->Cell(140,6,utf8_decode("No"),1,1,'C');
        

        $pdf->Ln();
        $pdf->SetFillColor(232,232,232);
        $pdf->SetTextColor(21,70,97);
        $pdf->SetFont('Helvetica','B',12);
        $pdf->Cell(106,5,utf8_decode("ANTECEDENTES PERSONALES NO PATALÓGICOS"),0,1,'C');
        $pdf->Ln();

        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Arial','B',12);

        $obj = json_decode($row['ant_per_no_pat']);

        $pdf->Cell(135,6,utf8_decode('¿Cuanta su hogar con todos los servicios básicos de urbanidad?'),1,0,'C',1);
        $pdf->SetFillColor(232,232,232);
        //$pdf->Cell(140,6,utf8_decode($row['servicios_basicos']),1,1,'C');
        
    }
	
	$pdf->Output();
?>