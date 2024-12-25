<?php
include('./dbconnection.php');
$updatedid=$_POST['updatedid'];
$updatedname=$_POST['updatedname'];
$updatedcity=$_POST['updatedcity'];

$updatesql="UPDATE `ajaxcrudtable` SET `stuname`='$updatedname',`stucity`='$updatedcity' WHERE stuid=$updatedid";

$resultupdate=mysqli_query($conn,$updatesql);

if($resultupdate){
  echo 1;
}else{
  echo 0;
}