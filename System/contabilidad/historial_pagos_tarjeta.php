<?php
    @session_start();
    error_reporting(0);
    if($_SESSION['rol']!='admin'){
        if($_SESSION['rol']!='secretaria')
        header('location: ../panel.php');
    }
        //echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
    $usuario = $_SESSION['u'];
    include('../php/base.php');
    include('../php/base2.php');
    include('../php/base3.php');
   date_default_timezone_set("Mexico/General");
   
   #variable con la hora con formato am, pm
  
   //echo que imprime la hora.
   //echo "Hola, mundo! La hora actual es : $currentTime"; 
?>

<!DOCTYPE html>
<html class="html">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.0.314.244"/>
  <title>Ingresos con tarjeta</title>
          <link rel="shortcut icon" type="x-icon" href="../images/icon.png" /><!--para logo en barra-->
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="../css/site_global.css?417434784"/>
  <link rel="stylesheet" type="text/css" href="../css/master_panel-master.css?3855693814"/>
  <link rel="stylesheet" type="text/css" href="../css/agenda.css?272506617" id="pagesheet"/>
  <link rel="stylesheet" type="text/css" href="../css/agendatabla.css" />
  <link rel="stylesheet" type="text/css" href="../css/texto.css" />
  <link rel="stylesheet" type="text/css" href="../css/s1.css"/>

 <style type="text/css">
    .no_vert_scroll {
        overflow-y: visible; 
    } 
  </style>
  
  <!-- Other scripts -->
  <script type="text/javascript">
   document.documentElement.className += ' js';
</script>
   </head>
 <body >

  <div class="clearfix" id="page"><!-- column -->
   <div class="position_content" id="page_position_content">
    <div class="clearfix colelem" id="pu366"><!-- group -->
     <div class="browser_width grpelem" id="u366"><!-- group -->
      <div class="clearfix" id="u366_align_to_page">
       <a class="nonblock nontext clip_frame grpelem" id="u513" href="../index.php"><!-- image --><img class="block" id="u513_img" src="../images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
       <div class="grpelem" id="u516"><!-- simple frame --></div>
       <div class="clearfix grpelem" id="u518-5"><!-- content -->
        <p><?php echo $_SESSION['nombres'];?>&nbsp; | <span id="u518-2"> <a href="../php/logout.php"><h12> cerrar sesion</h12></a></span></p>

       </div>
      </div>
     </div>     
       <a href="../panel.php">
      <img class="grpelem" id="u372" alt="servicios" src="../images/blank.gif"/><!-- state-based BG ../images -->
      </a>
    </div>

    <div class="clearfix colelem" id="pu375"><!-- group -->
     <div class="browser_width grpelem" id="u375"><!-- simple frame --></div>
     <?php
     if($_SESSION['rol']=='admin'){
     echo '
     <a class="nonblock nontext grpelem" id="u376" href="../agenda.php"><!-- state-based BG images --><img id="u376_states" alt="Registro de consultas" src="../images/blank.gif"/></a>
     <a class="nonblock nontext grpelem" id="u377" href="../buscar-paciente.php"><!-- state-based BG ../images --><img id="u377_states" alt="Buscar paciente" src="../images/blank.gif"/></a>
     <a class="nonblock nontext grpelem" id="u378" href="../add-paciente.php"><!-- state-based BG images --><img id="u378_states" alt="Agregar pacientes" src="../images/blank.gif"/></a>
     <a class="nonblock nontext grpelem" id="u480" href="../add-usuario.php"><!-- state-based BG images --><img id="u480_states" alt="Agregar usuarios" src="../images/blank.gif"/></a>';
     }
     echo '<a class="nonblock nontext grpelem" id="u550" href="../almacen.php"><!-- state-based BG images --><img id="u550_states" alt="Almacen" src="../images/blank.gif"/></a>';
     if($_SESSION['rol']=='admin'){
     echo '
     <a class="nonblock nontext grpelem" id="u552" href="../contabilidad.php"><!-- state-based BG images --><img id="u552_states" alt="Contabilidad" src="../images/blank.gif"/></a>';
     }
     ?>
    </div>
    <div class="clearfix colelem" id="pu1078-4"><!-- group -->
    <div style="width:800px; ">
        <h9>Pagos con Tarjeta</h9>
     </div>
     <div class="clearfix grpelem" id="u1079-4"><!-- content -->
      <!--p>*Esto es un ejemplo</p-->
     </div>
    </div>
    <br><br><br>

<div style="margin-left:10%; background:#FFFDFD; padding:18px; width:730px; margin-top:200px " >
<?php

$mes = $_GET['mes'];
$ano = $_GET['ano'];
$mes2 = $_GET['mes'];

if($mes2 == '')
  $mes2 = date('m');
$dia2 = $_GET['dia'];

$tipo_semana = 1;
$tipo_mes = 1;

$MESCOMPLETO[1] = 'Enero';
$MESCOMPLETO[2] = 'Febrero';
$MESCOMPLETO[3] = 'Marzo';
$MESCOMPLETO[4] = 'Abril';
$MESCOMPLETO[5] = 'Mayo';
$MESCOMPLETO[6] = 'Junio';
$MESCOMPLETO[7] = 'Julio';
$MESCOMPLETO[8] = 'Agosto';
$MESCOMPLETO[9] = 'Septiembre';
$MESCOMPLETO[10] = 'Octubre';
$MESCOMPLETO[11] = 'Noviembre';
$MESCOMPLETO[12] = 'Diciembre';

$MESABREVIADO[1] = 'Ene';
$MESABREVIADO[2] = 'Feb';
$MESABREVIADO[3] = 'Mar';
$MESABREVIADO[4] = 'Abr';
$MESABREVIADO[5] = 'May';
$MESABREVIADO[6] = 'Jun';
$MESABREVIADO[7] = 'Jul';
$MESABREVIADO[8] = 'Ago';
$MESABREVIADO[9] = 'Sep';
$MESABREVIADO[10] = 'Oct';
$MESABREVIADO[11] = 'Nov';
$MESABREVIADO[12] = 'Dic';

$SEMANACOMPLETA[0] = 'Domingo';
$SEMANACOMPLETA[1] = 'Lunes';
$SEMANACOMPLETA[2] = 'Martes';
$SEMANACOMPLETA[3] = 'Miércoles';
$SEMANACOMPLETA[4] = 'Jueves';
$SEMANACOMPLETA[5] = 'Viernes';
$SEMANACOMPLETA[6] = 'Sábado';

$SEMANAABREVIADA[0] = 'Dom';
$SEMANAABREVIADA[1] = 'Lun';
$SEMANAABREVIADA[2] = 'Mar';
$SEMANAABREVIADA[3] = 'Mie';
$SEMANAABREVIADA[4] = 'Jue';
$SEMANAABREVIADA[5] = 'Vie';
$SEMANAABREVIADA[6] = 'Sáb';

////////////////////////////////////
if($tipo_semana == 1){
$ARRDIASSEMANA = $SEMANACOMPLETA;
}elseif($tipo_semana == 0){
$ARRDIASSEMANA = $SEMANAABREVIADA;
}
if($tipo_mes == 0){
$ARRMES = $MESCOMPLETO;
}elseif($tipo_mes == 1){
$ARRMES = $MESABREVIADO;
}

if(!$dia) $dia = date(d);
if(!$mes) $mes = date(n);
if(!$ano) $ano = date(Y);

$TotalDiasMes = date(t,mktime(0,0,0,$mes,$dia,$ano));
$DiaSemanaEmpiezaMes = date(w,mktime(0,0,0,$mes,1,$ano));
$DiaSemanaTerminaMes = date(w,mktime(0,0,0,$mes,$TotalDiasMes,$ano));
$EmpiezaMesCalOffset = $DiaSemanaEmpiezaMes;
$TerminaMesCalOffset = 6 - $DiaSemanaTerminaMes;
$TotalDeCeldas = $TotalDiasMes + $DiaSemanaEmpiezaMes + $TerminaMesCalOffset;


if($mes == 1){
$MesAnterior = 12;
$MesSiguiente = $mes + 1;
$AnoAnterior = $ano - 1;
$AnoSiguiente = $ano;
}elseif($mes == 12){
$MesAnterior = $mes - 1;
$MesSiguiente = 1;
$AnoAnterior = $ano;
$AnoSiguiente = $ano + 1;
}else{
$MesAnterior = $mes - 1;
$MesSiguiente = $mes + 1;
$AnoAnterior = $ano;
$AnoSiguiente = $ano;
$AnoAnteriorAno = $ano - 1;
$AnoSiguienteAno = $ano + 1;
}
     
    echo "<br>
      <a href='?ano=",$ano,"&S=0'>
        <div id='botnH' style='float:left; border:1px solid gray'>
        Ver historial de este año
        </div>
      </a>";
    echo "<a href='?mes=",$mes,"&S=0'>
        <div id='botnH' style='width:170px; float:right; border:1px solid gray'>
        Ver historial de este mes
        </div>
        </a>";

print "<br><br><br><br><table float>";
print " <tr id='t'>";
print " <td width=\"1%\"><a href=\"$PHP_SELF?mes=$mes&ano=$AnoAnteriorAno\">ano anterior</a></td>";
print " <td width=\"1%\"><a href=\"$PHP_SELF?mes=$MesAnterior&ano=$AnoAnterior\">Mes anterior</a></td>";
print " <td width=\"1%\" colspan=\"1\" align=\"center\" nowrap><b>".$ARRMES[$mes]." - $ano</b></td>";
print " <td width=\"1%\"><a href=\"$PHP_SELF?mes=$MesSiguiente&ano=$AnoSiguiente\">Mes siguiente</a></td>";
print " <td width=\"1%\"><a href=\"$PHP_SELF?mes=$mes&ano=$AnoSiguienteAno\">ano siguiente</a></td>";
print " </tr>";
print " </table>";


    include("php/base.php");
    include("php/base2.php");
    include("php/base3.php");
    
    $dia_seleccionable = $_GET['dia'];
    //print "$dia_seleccionable $mes $ano";
    if($dia_seleccionable==1)
      $dia_seleccionable='01';
    if($dia_seleccionable==2)
      $dia_seleccionable='02';
    if($dia_seleccionable==3)
      $dia_seleccionable='03';      
    if($dia_seleccionable==4)
      $dia_seleccionable='04';   
    if($dia_seleccionable==5)
      $dia_seleccionable='05';   
    if($dia_seleccionable==6)
      $dia_seleccionable='06';                    
     if($dia_seleccionable==7)
      $dia_seleccionable='07';   
    if($dia_seleccionable==8)
      $dia_seleccionable='08';   
     if($dia_seleccionable==9)
      $dia_seleccionable='09'; 
    
    
    if($mes2==1)
      $mes2='01';
    if($mes2==2)
      $mes2='02';
    if($mes2==3)
      $mes2='03';     
    if($mes2==4)
      $mes2='04';   
    if($mes2==5)
      $mes2='05';   
    if($mes2==6)
      $mes2='06';                     
     if($mes2==7)
      $mes2='07';   
    if($mes2==8)
      $mes2='08';   
     if($mes2==9)
      $mes2='09'; 
    
  $fechab = $ano."-".$mes2."-".$dia_seleccionable;
  

if($mes2=='')
      $fechab = $ano;

 echo "<div style='width:730px; background: #FFF; min-height:130px; margin-left:-20px; position: absolute; padding:20px; margin-bottom:40px'>
        <center>
        <label>";
    if($mes2!='')    
  echo " Historial de  ", $dia_seleccionable," de ",$MESCOMPLETO[$mes]," del ",$ano ,"</label><br><br>";
    else
      echo "Historial del año: ",$ano ,"</label>";
 
    

    $semana = date(W);
    $ano_s = $ano;

    $S = $_GET['S'];
    $semana_b = $_GET['semana_b'];
        $semana_anterior = $semana_b-1;
        $semana_siguiente = $semana_b+1;

    if($semana_anterior=='-1'){
        $semana_anterior = 51;
        $ano_s = $ano-1;
    }
    if($semana_siguiente=='51'){
        $semana_siguiente = 0;
        $ano_s = $ano+1;
    }

    /*if($semana_b==''){
     $result2 = mysql_query("select * from pago_adeudo where fecha like '%$fechab%'");
     $result2 = mysql_query("select * from historial_compras where fecha like '%$fechab%'");
    }
    else{
  $result2 = mysql_query("select * from historial_pagos");
        $result2 = mysql_query("select * from historial_compras where semana='$semana_b' and y='$ano_s'");
    }*/
    



function semanasMes($year,$month)
{
    # Obtenemos el ultimo dia del mes
    $ultimoDiaMes=date("t",mktime(0,0,0,$month,1,$year));
    
    # Obtenemos la semana del primer dia del mes
    $primeraSemana=date("W",mktime(0,0,0,$month,1,$year));
    
    # Obtenemos la semana del ultimo dia del mes
    $ultimaSemana=date("W",mktime(0,0,0,$month,$ultimoDiaMes,$year));
    
    # Devolvemos en un array los dos valores
    return array($primeraSemana,$ultimaSemana);
}


    list($primeraSemana,$ultimaSemana)=semanasMes($ano,$mes2);
  if($ultimaSemana=='01' || $ultimaSemana=='1')
    $ultimaSemana=53;


//echo 'Los dias de la semana '.$primeraSemana.' estan entre: <br>';
//for($mmm=1;$mmm<12;$mmm++){
    //$limite = date('t',mktime(0,0,0,$mes,1,$ano));
    //for($ddd=1;$ddd<$limite;$ddd++){
        //if(date('W',mktime(0, 0, 0, $mmm  , $ddd, $ano)) == $primeraSemana){
          //  if(date('N',mktime(0, 0, 0, $mmm  , $ddd, $ano)) == 1){
                //echo 'Lunes '.date('d-m-Y',mktime(0, 0, 0, $mmm  , $ddd, $ano)).' y Domingo '.date('d-m-Y',mktime(0, 0, 0, $mmm  , $ddd+6, 2014));
    
  //          }
    //    }
    //}
//} 


 $TOTAL_TARJETA = 0;

  echo "<table border=1 style='margin-top:100px; '>
    <tr>
          <td style='color:#58ACFA'>Fecha             </td>";

          echo "<td style='color:#58ACFA'>Nombre <br>"; 
          echo "<td style='color:#58ACFA'>Concepto <br>";

    echo "<td style='color:#58ACFA'>Cantidad</td>
    </tr>";
  
//$valor = 0;
$fecha_semanal = $ano."-".$mes;


/*+++++++++++++++++++++++TARJETA++++++++++++++++++++++++*/    
$semana = $primeraSemana;
$total = 0;
$fecha = $ano."-".$mes;
//echo $fecha;
$result_pagos = mysql_query("select * from pago_adeudo");

setlocale(LC_MONETARY, 'en_US');
 
    while ($fila_pagos = mysql_fetch_array($result_pagos, MYSQL_NUM)){
      $id_adeudo = $fila_pagos['0'];
        $result_pagos2 = mysql_query("select * from pagos_historia where id_tipo='3' and fecha like '%$fecha%' and id_adeudo='$id_adeudo'");

        //print "select * from pagos_historia where id_tipo='3' and fecha like '%$fecha%'";
        while ($fila_pagos2 = mysql_fetch_array($result_pagos2, MYSQL_NUM)){
          echo "<tr>";
            echo "<td>".$fila_pagos2[5]."</td>";

            $paciente = $fila_pagos2[2];
            $select = 'select * from paciente where id_paciente="'.$paciente.'";';
            $resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
            $renglon = mysql_fetch_assoc($resul);
            echo "<td>".$renglon['nombres']." ".$renglon['apellido_paterno']." ".$renglon['apellido_materno']."</td>";

            echo "<td>",($fila_pagos[4]),"</td>";
            $total = $total + $fila_pagos2[4];
            echo "<td>",money_format('%(#10n',$fila_pagos2[4]),"</td>";
          echo "</tr>";
        }
    }


$valor = 0;
$semana++;

//echo "<td>",$total,"</td></tr>";
$TOTAL_TARJETA=$TOTAL_TARJETA+$total;
/*+++++++++++++++++++++++TERMINA TARJETA++++++++++++++++++++++++*/
$valor = 0;

/*+++++++++++++++++++++++ PRODUCTO TARJETA++++++++++++++++++++++++*/    
$total = 0;
$fecha = $ano."-".$mes;
//echo $fecha;
//$result_pagos = mysql_query("select * from pago_adeudo");


    //while ($fila_pagos = mysql_fetch_array($result_pagos, MYSQL_NUM)){
      //$id_adeudo = $fila_pagos['0'];
        $result_pagos2 = mysql_query("select * from historial_compras where id_tipo='3' and fecha like '%$fecha%'");

        //print "select * from historial_compras where id_tipo='3' and fecha like '%$fecha%'";
        while ($fila_pagos2 = mysql_fetch_array($result_pagos2, MYSQL_NUM)){
          echo "<tr>";
            echo "<td>".$fila_pagos2[7]."</td>";

            $paciente = $fila_pagos2[1];
            $select = 'select * from paciente where id_paciente="'.$paciente.'";';
            $resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
            $renglon = mysql_fetch_assoc($resul);
            if($renglon['nombres']!='')
            echo "<td>".$renglon['nombres']." ".$renglon['apellido_paterno']." ".$renglon['apellido_materno']."</td>";
            else
              echo "<td>Comprador</td>";

            $producto = $fila_pagos2[3];
            $select = 'select * from inventario where id_producto="'.$producto.'";';
            $resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
            $renglon = mysql_fetch_assoc($resul);
            echo "<td>",$renglon['nombre'],"</td>";
            $total = $total + $fila_pagos2[6];
            echo "<td>",money_format('%(#10n',$fila_pagos2[6]),"</td>";
          echo "</tr>";
        }
    


$valor = 0;
$semana++;

//echo "<td>",$total,"</td></tr>";
$TOTAL_TARJETA=$TOTAL_TARJETA+$total;
/*+++++++++++++++++++++++TERMINA PRODUCTO TARJETA++++++++++++++++++++++++*/

/*+++++++++++++++++++++++ DIPLOMADO TARJETA++++++++++++++++++++++++*/    
$semana = $primeraSemana;
$total = 0;

$result_pagos = mysql_query("select * from historial_diplomados where fecha like '%$fecha%' && tipo_pago='3'");


    while ($fila_pagos = mysql_fetch_array($result_pagos, MYSQL_NUM)){
      echo "<tr>";
      echo "<td>",$fila_pagos[7],"</td>";
      $usuario = $fila_pagos[2];
            $select = 'select * from paciente where id_paciente="'.$usuario.'";';
            $resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
            $renglon = mysql_fetch_assoc($resul);
            if($renglon['nombres']==''){
              $select = 'select * from usuarios where id_usuario="'.$usuario.'";';
              $resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
              $renglon = mysql_fetch_assoc($resul);
            }
      echo "<td>".$renglon['nombres']." ".$renglon['apellido_paterno']." ".$renglon['apellido_materno']."</td>";
      echo "<td>".$fila_pagos[3]."</td>";
      echo "<td>".money_format('%(#10n',$fila_pagos[4])."</td>";
      $total = $total + $fila_pagos['4']; 
      echo "</tr>";
    }



$valor = 0;
$semana++;


$TOTAL_TARJETA=$TOTAL_TARJETA+$total;
/*+++++++++++++++++++++++TERMINA DIPLOMADO TARJETA++++++++++++++++++++++++*/


/*+++++++++++++++++++++++ INSTRUMENTAL TARJETA++++++++++++++++++++++++*/    
$semana = $primeraSemana;
$total = 0;

$result_pagos = mysql_query("select * from historial_instrumental where fecha like '%$fecha%' && tipo_pago='3'");


    while ($fila_pagos = mysql_fetch_array($result_pagos, MYSQL_NUM)){
      echo "<tr>";
      echo "<td>",$fila_pagos[7],"</td>";
      $usuario = $fila_pagos[2];
            $select = 'select * from paciente where id_paciente="'.$usuario.'";';
            $resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
            $renglon = mysql_fetch_assoc($resul);
            if($renglon['nombres']==''){
              $select = 'select * from usuarios where id_usuario="'.$usuario.'";';
              $resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
              $renglon = mysql_fetch_assoc($resul);
            }
      echo "<td>".$renglon['nombres']." ".$renglon['apellido_paterno']." ".$renglon['apellido_materno']."</td>";
      echo "<td>".$fila_pagos[3]."</td>";
      echo "<td>".money_format('%(#10n',$fila_pagos[4])."</td>";
      $total = $total + $fila_pagos['4']; 
      echo "</tr>";
    }



$valor = 0;
$semana++;


$TOTAL_TARJETA=$TOTAL_TARJETA+$total;
/*+++++++++++++++++++++++TERMINA INSTRUMENTAL TARJETA++++++++++++++++++++++++*/




echo "</table>";

  echo "<table border=1 style='margin-top:100px; '>
    <tr>
          <td style='color:#58ACFA'>Total de Pagos con Tarjeta       </td><td>",money_format('%(#10n',$TOTAL_TARJETA),"</td>";
    echo "</tr>";

    
echo "</table>";
//echo "<br>totales: ", $TOTAL_EFECTIVO;
/*
echo "totales: ", $TOTAL_CHEQUE;

echo "<br>totales: ", $TOTAL_TRANSFERENCIA;
echo "<br>totales: ", $TOTAL_TARJETA;*/
?>







   </div>
  
  </div>
   
  <div class="preload_images">
   <img class="preload" src="../images/u372-r.png" alt=""/>
   <img class="preload" src="../images/u376_states-r.png" alt=""/>
   <img class="preload" src="../images/u376_states-a.png" alt=""/>
   <img class="preload" src="../images/u377_states-r.png" alt=""/>
   <img class="preload" src="../images/u377_states-a.png" alt=""/>
   <img class="preload" src="../images/u378_states-r.png" alt=""/>
   <img class="preload" src="../images/u378_states-a.png" alt=""/>
   <img class="preload" src="../images/u480_states-r.png" alt=""/>
   <img class="preload" src="../images/u480_states-a.png" alt=""/>
   <img class="preload" src="../images/u550_states-r.png" alt=""/>
   <img class="preload" src="../images/u550_states-a.png" alt=""/>
   <img class="preload" src="../images/u552_states-r.png" alt=""/>
   <img class="preload" src="../images/u552_states-a.png" alt=""/>
  </div>
  <!-- JS includes -->
  <script type="text/javascript">
   if (document.location.protocol != 'https:') document.write('\x3Cscript src="http://musecdn.businesscatalyst.com/scripts/4.0/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
  <script type="text/javascript">
   window.jQuery || document.write('\x3Cscript src="scripts/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
  <script src="../scripts/museutils.js?3865766194" type="text/javascript"></script>
  <script src="../scripts/jquery.tobrowserwidth.js?3842421675" type="text/javascript"></script>
  <script src="../scripts/jquery.watch.js?4068933136" type="text/javascript"></script>
  <!-- Other scripts -->
  <script type="text/javascript">
   $(document).ready(function() { try {
Muse.Utils.transformMarkupToFixBrowserProblemsPreInit();/* body */
$('.browser_width').toBrowserWidth();/* browser width elements */
Muse.Utils.prepHyperlinks(true);/* body */
Muse.Utils.fullPage('#page');/* 100% height page */
Muse.Utils.showWidgetsWhenReady();/* body */
Muse.Utils.transformMarkupToFixBrowserProblems();/* body */
} catch(e) { Muse.Assert.fail('Error calling selector function:' + e); }});
</script>
   </body>
</html>
