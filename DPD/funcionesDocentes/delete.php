<?php
$connect = mysqli_connect("localhost", "udb_dpdpucv", "c9we85hm", "db_dpdpucv");
if(isset($_POST["id"]))
{
 $query = "DELETE FROM docentes WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Docente Eliminado';
 }
}
?>