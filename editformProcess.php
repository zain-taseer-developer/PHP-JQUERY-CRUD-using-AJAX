<?php 
include('./dbconnection.php');
$idofdata=$_GET['idofdata'];
// print_r($idofdata);

$editTable='';

$sqlfortable="SELECT * FROM `ajaxcrudtable` where stuid=$idofdata";
$resultfortable=mysqli_query($conn,$sqlfortable);
// echo "<pre>";
// print_r($resultfortable);
// echo "</pre>";
if ($resultfortable->num_rows > 0) {
  
  while ($rows = mysqli_fetch_assoc($resultfortable)) {
// echo "<pre>";
// print_r($rows['stucity']);
// echo "</pre>";
$editTable.="<form class='updateEditForm' style='margin-top:25px; display: flex
;flex-direction: column;width: 80%;margin: auto;
}'>
  
  <input type='number' id='updatestuIdInput' hidden value={$rows['stuid']}>

  <label >Student Name</label>
  <input type='text' id='updatestuNameInput' value='{$rows['stuname']}'>

  <label >Student City</label>
  <input type='text' id='updatestuCityInput' value='{$rows['stucity']}'>

   <button type='submit' id='updateFormBtn'>Submit</button>
  </form>";

  }
  echo $editTable;
}