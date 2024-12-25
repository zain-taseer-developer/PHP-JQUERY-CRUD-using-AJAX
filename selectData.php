<?php

include('./dbconnection.php');
$selectSql="SELECT * FROM `ajaxcrudtable`";
$resultSelect=mysqli_query($conn,$selectSql);
// print_r($resultSelect);
echo "<br>";

$allFetchedData='';
if($resultSelect->num_rows>0){
  $allFetchedData='<table border="1" width="100%" cellspacing="0" cellpadding="10px">
  <thead>
  <tr>
  <td>Student ID</td>
  <td>Student Name</td>
  <td>Student City</td>
  <td>Actions</td>
  </tr>
  </thead>
   <tbody>
  <tr>
  ';
while($row=mysqli_fetch_assoc($resultSelect)){
// print_r($row);
$allFetchedData.="
<tbody>
<tr>
  <td>{$row['stuid']}</td>
  <td>{$row['stuname']}</td>
  <td>{$row['stucity']}</td>
  <td style='display:flex; gap:20px;'>
  <button class='update-btn' Data-upadteid='{$row['stuid']}'>Update</button>
  <button class='delete-btn' Data-delid='{$row['stuid']}'>Delete</button>
  </td>
  
  </tr>
<tbody>";            
}

$allFetchedData.="</table>";
echo $allFetchedData;

}else{
  echo "maybe some issue in db or internal error ";
}









