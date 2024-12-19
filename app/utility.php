<?php
function updateAccessLog($message, $conn){
  $sql = "INSERT INTO system_logs (log_date, log_time, log_message) VALUES (UTC_DATE, UTC_TIME, '$message')";

  $conn->query($sql); 
}
?>