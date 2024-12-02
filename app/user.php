<?php

function getUser($conn, $user_id):array{
 $sql = "SELECT * FROM users WHERE user_id = $user_id";

  $result = $conn->query($sql);  
  $data = $result->fetch_assoc();

  return $data; 
}
?>