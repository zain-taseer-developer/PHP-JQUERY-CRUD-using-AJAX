<?php
include('./dbconnection.php');
// get values from form
$idstudentdb=$_POST['idHere'];
$namestudentdb=$_POST['nameHere'];
$cityHere=$_POST['cityHere'];



 $sql="INSERT INTO `ajaxcrudtable`(`stuname`, `stucity`) VALUES ('$namestudentdb','$cityHere')"; 
 $result=mysqli_query($conn,$sql);
 if($result){
  echo 1;
 }else{
  echo 0;
}
