<?php
require 'connect.php';
error_reporting(E_ERROR);
$familles = [];
$sql = "SELECT * FROM  register";

if($result = mysqli_query($con,$sql))
{
  $cr = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $familles[$cr]['id']    = $row['id'];
    $familles[$cr]['username'] = $row['username'];
    $familles[$cr]['email'] = $row['email'];
    $familles[$cr]['firstName'] = $row['first_name'];
    $familles[$cr]['lastName'] = $row['last_name'];
    $familles[$cr]['age'] = $row['age'];
    $cr++;
  }
    
    //print_r($students);

  echo json_encode($familles);
}
else
{
  http_response_code(404);
}
?>