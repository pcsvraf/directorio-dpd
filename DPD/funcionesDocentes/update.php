<?php
$connect = mysqli_connect("localhost", "udb_dpdpucv", "c9we85hm", "db_dpdpucv");
if(isset($_POST["id"]))
{
 $value = utf8_decode(mysqli_real_escape_string($connect, $_POST["value"]));
 
 $query = "UPDATE docentes SET ".$_POST["column_name"]."='$value' WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Docente Actualizado';
 }
 else {
  echo 'No se actualizaron los datos';    
 }
}
?>