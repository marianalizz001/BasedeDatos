<?php
  include ('Conexion.php');
  $fecha = date('Y-m-d');
  $fecha_15 = date('Y-m-d', strtotime($fecha. '-15 years'));
  

  $sql1="SELECT year(f_nac), count(f_nac) from usuario where tipo_usuario='P' group by year(f_nac)";
  $result1=mysqli_query($conexion,$sql1);
  $valoresY1=array();
  $valoresX1=array();
  $cont0=0;
  $cont1=0;
  $cont2=0;
  $cont3=0;
  $cont4=0;
  $cont5=0;
  while ($ver1=mysqli_fetch_row($result1)){
      if($ver1[0]>date('Y-m-d', strtotime($fecha. '-15 years')) and $ver1[0]<=date('Y-m-d')){
          $cont0=$cont0+1;
          $valoresX1[0]="0-15";
      }
      if($ver1[0]>date('Y-m-d', strtotime($fecha. '-30 years')) and $ver1[0]<=date('Y-m-d', strtotime($fecha. '-15 years'))){
        $cont1=$cont1+1;
        $valoresX1[1]="16-30";
      }
      if($ver1[0]>date('Y-m-d', strtotime($fecha. '-45 years')) and $ver1[0]<=date('Y-m-d', strtotime($fecha. '-30 years'))){
        $cont2=$cont2+1;
        $valoresX1[2]="31-45";
      }
      if($ver1[0]>date('Y-m-d', strtotime($fecha. '-60 years')) and $ver1[0]<=date('Y-m-d', strtotime($fecha. '-45 years'))){
        $cont3=$cont3+1;
        $valoresX1[3]="45-60";
      }
      if($ver1[0]>date('Y-m-d', strtotime($fecha. '-75 years')) and $ver1[0]<=date('Y-m-d', strtotime($fecha. '-60 years'))){
        $cont4=$cont4+1;
        $valoresX1[4]="60-75";
      }
      if($ver1[0]>date('Y-m-d', strtotime($fecha. '-90 years')) and $ver1[0]<=date('Y-m-d', strtotime($fecha. '-75 years'))){
        $cont5=$cont5+1;
        $valoresX1[5]="75-90";
      }
    //$valoresY1[]=$ver1[1];
    //$valoresX1[]=$ver1[0];
  }
  $valoresY1[0]=$cont0;
  $valoresY1[1]=$cont1;
  $valoresY1[2]=$cont2;
  $valoresY1[3]=$cont3;
  $valoresY1[4]=$cont4;
  $valoresY1[5]=$cont5;
  $datosX1=json_encode($valoresX1);
  $datosY1=json_encode($valoresY1);
?>

<div id="graficaBarras"></div>

<script type="text/javascript">
  function crearCadenaLineal(json){
    var parsed = JSON.parse(json);
    var arr = [];
    for(var x in parsed){
      arr.push(parsed[x]);
    }
    return arr;
  }
</script>

<script type="text/javascript">

    datosX1=crearCadenaLineal('<?php echo $datosX1 ?>');
    datosY1=crearCadenaLineal('<?php echo $datosY1 ?>');

    var data = [
  {
    x: datosX1,
    y: datosY1,
    type: 'bar'
  }
];

Plotly.newPlot('graficaBarras', data);
</script>