<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Listo</title>
	  <link rel="stylesheet" type="text/css" href="../css/texto.css"/>

	<style type="text/css" media="screen">

	 body{
	  background: steelblue;
	  color: #1C1C1C;
	 }
	 a, a:hover{
	  color: white;
	  text-decoration: none;
	 }
	</style>

</head>
<body>
<?php
	$a = $_POST['titulo'];
	$b = $_POST['texto'];
	$c = $_POST['usuario'];
	
	$a = htmlentities($a);
	$b = htmlentities($b);
	

include('../php/base.php');
include('../php/base3.php');
$insertar = "insert into avisos (titulo, contenido, id_persona, fecha)values ('$a','$b','$c', now())";


if(!mysql_query($insertar, $conexion))
	die('Error de consulta: '.mysql_error());
else
		//echo "Deuda Generada";
		echo '<br><br><br><center><img src="../images/endoperio2.png" width="100px" alt=""> <br> ';
		echo "Proceso &eacute;xitoso<br><br><br>";
		echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
		echo "<a href='../panel.php'>Regresar </a></center></div>";
	
		echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../panel.php">';

			mysql_close($conexion);	
	?>
</body>
</html>

