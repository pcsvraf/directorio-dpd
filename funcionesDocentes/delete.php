<?php
$connect = mysqli_connect("localhost", "estudiantespucv_dpd", "DpdPucv20xx", "estudiantespucv_dpd");
if(isset($_POST["id"]))
{
 $query = "DELETE FROM docentes WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Docente Eliminado';
 }
}
?>