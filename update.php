<?php
require 'connect.php';

// Get the posted data.

$postdata = file_get_contents("php://input");

//print_r($postdata);

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);
	

  // Sanitize.
  $id = mysqli_real_escape_string($con, trim($request->id));
  $username = mysqli_real_escape_string($con, trim($request->username));
  $email = mysqli_real_escape_string($con, $request->email);
  $firstName = mysqli_real_escape_string($con, trim($request->firstName));
  $lastName = mysqli_real_escape_string($con, trim($request->lastName));
  $age = mysqli_real_escape_string($con, $request->age);
 
  // Update.
   $sql = "UPDATE `register` SET 
   `username`='$username',
   `email`='$email',
   `first_name`='$firstName',
   `last_name`='$lastName',
   `age`='$age'
    WHERE `id` = '{$id}' LIMIT 1";

  if(mysqli_query($con, $sql))
  {
    //http_response_code(204);
  }
  else
  {
    return http_response_code(422);
  }  
}
