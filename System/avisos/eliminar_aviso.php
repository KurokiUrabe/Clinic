<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
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
	$id = $_GET['id'];

	/*$base = mysql_select_db('Endoperio', $dbh) or die('Error de seleccion de base: ' . mysql_error() );*/
include('../php/base.php');
include('../php/base3.php');
	$select = 'select * from avisos where id_aviso="'.$id.'";';
	$resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
	$renglon = mysql_fetch_assoc($resul);
		$eliminar = 'delete from avisos where id_aviso="'.$id.'";';

		if(!mysql_query($eliminar, $dbh))
			die('Error de consulta: '.mysql_error());
		mysql_close($conexion);

		echo '<br><br><br><center><img src="../images/endoperio2.png" width="100px" alt=""> <br> ';
		echo "Proceso realizado con exito<br><br><br>";
		
	?>
		<div style="  padding:9px;  border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">
			<a href='lista_avisos.php' style='color:white;' >Regresar</a>
		</div>
		<META HTTP-EQUIV="Refresh" CONTENT="1; URL=lista_avisos.php">

</body>
</html>
