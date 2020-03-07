<?php
require 'connect.php';

 $postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  $request = json_decode($postdata);

  //print_r($request);
  
  // Sanitize.
  $username = mysqli_real_escape_string($con, trim($request->username));
  $email = mysqli_real_escape_string($con, trim($request->email));
  $password = mysqli_real_escape_string($con, trim($request->password));
  $firstname = mysqli_real_escape_string($con, trim($request->firstName));
  $lastname = mysqli_real_escape_string($con, trim($request->lastName));
  $age = mysqli_real_escape_string($con, trim($request->age));
  

  // Store.
  $sql = "INSERT INTO `register`(
     `username`,
     `email`,
     `password`,
     `first_name`,
     `last_name`,
     `age`
 ) VALUES
  ('{$username}',
   '{$email}',
  '{$password}',
  '{$firstname}',
  '{$lastname}',
  '{$age}'
  )";

  if(mysqli_query($con,$sql))
  {
    http_response_code(201);
  }
  else
  {
    http_response_code(422);
  }
}