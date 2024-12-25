<?php 
include("./dbconnection.php");

$idtodelData=$_GET['idtodel'];
// echo $idtodelData;

$sqlDelete="DELETE FROM `ajaxcrudtable` WHERE stuid=$idtodelData ";
$querydel=mysqli_query($conn,$sqlDelete);
if($querydel){
  echo 1;
}
else{
  echo 0;
}
?>