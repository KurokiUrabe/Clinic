<?php
  include('../php/base.php');
  include('../php/base2.php');
  include('../php/base3.php');
   date_default_timezone_set("Mexico/General");
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Ventas</title>
  <link rel="shortcut icon" type="x-icon" href="../images/icon.png" /><!--para logo en barra-->
 

  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

</head>
  <body >


  <?php 
              $res= mysql_query("select id_paciente, nombres, apellido_paterno, apellido_materno from paciente LIMIT 3000");       
              $numero = mysql_num_rows($res);
              $Arr;
           
              if(mysql_num_rows($res)==0)
                 array_push($Arr, "No hay datos");
              else{
                $i=0;
                while($pacientes = mysql_fetch_array($res)){
                  $Arr[$i] =($pacientes['id_paciente'].' - '.$pacientes["nombres"].' '.$pacientes['apellido_paterno'].' '.$pacientes['apellido_materno']);
                  $i++;
                }
              }

?>

 
              <script >
                  var availableTags = <?php echo json_encode($Arr); ?>                 

                $(function(){
                  

                    $("#tags").autocomplete({ 
                     source: availableTags 
                   });
                });
              </script>

      <label for="tags">Tags: </label>
  <input id="tags">
          
            <?php 
              echo "los datos son".$numero;
            ?>
            </body>
</html>


