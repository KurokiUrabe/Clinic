<?php
$id = $_GET['id'];

/*$dbh = mysql_connect('localhost','root','') or die('Error de conexion: ' . mysql_error() );
$base = mysql_select_db('Endoperio', $dbh) or die('Error de seleccion de base: ' . mysql_error() );
/*$select = 'select * from Inventario where id_producto="'.$id.'";';
$resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
$renglon = mysql_fetch_assoc($resul);
$imagen = $renglon['imagen'];
unlink($imagen);*/

include('../php/base.php');
include('../php/base3.php');
	$eliminar = 'delete from inventario where id_producto="'.$id.'";';

	if(!mysql_query($eliminar, $dbh))
		die('Error de consulta: '.mysql_error());
	mysql_close($conexion);
header ("Location: ../almacen.php");


?>
