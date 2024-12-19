<?php
function addBilling($conn, $amount, $meter_id) {
  // include ("./meter.php");
  $sql = "INSERT INTO billing_and_payment (meter_id, billing_date, billing_time, amount_billed, payment_status, payment_method) VALUES ($meter_id, UTC_DATE(), UTC_TIME(), $amount, 'Successful', 'Bank')";
  $result = $conn->query($sql);
  
}