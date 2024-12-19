<?php

function getUser($conn, $user_id):array{
 $sql = "SELECT * FROM users WHERE user_id = $user_id";

  $result = $conn->query($sql);  
  $data = $result->fetch_assoc();

  return $data; 
}
function updateUser($conn, $user_id, $details):void{
  
  $phoneNumber = $details["newPhoneNumber"];
  $address = $details["newAddress"];
  $sql = "UPDATE users SET address = '$address', contact_number = '$phoneNumber'";

  $conn->query($sql);  
  echo $conn->error;
}
?>