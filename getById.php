<?php

require 'connect.php';

$id = $_GET['id']; 

  // Get by id.
$sql = "SELECT * FROM `register` WHERE `id` ='{$id}' LIMIT 1";

 if($result = mysqli_query($con,$sql))
{
   $cr = 0;

  $row = mysqli_fetch_assoc($result);
  
    $familles['id']    = $row['id'];
    $familles['username'] = $row['username'];
    $familles['email'] = $row['email'];
    $familles['firstName'] = $row['first_name'];
    $familles['lastName'] = $row['last_name'];
    $familles['password'] = $row['password'];
    $familles['age'] = $row['age'];
    
   // $cr++;
  
    
   //print_r($students);

  echo json_encode($familles);
}
else
{
  http_response_code(404);
}