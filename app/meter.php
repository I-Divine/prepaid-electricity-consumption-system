<?php
if(session_status() === PHP_SESSION_NONE){
  session_start();

}
function addMeter($meter, $conn){
  $meter_no = $meter["meter_number"];
  $meter_type = $meter["meter_type"];
  $user_id = $_SESSION["user_id"];
  
  $sqlCheck = "SELECT * FROM meters WHERE meter_number = $meter_no";

  $resultCheck = $conn->query($sqlCheck); 

  if($resultCheck->num_rows === 0){
    
      $sql = "INSERT INTO meters (meter_number, meter_type, user_id) VALUES('$meter_no', '$meter_type', '$user_id')";
      $sql2 = "INSERT INTO consumption_data (meter_id) VALUES(LAST_INSERT_ID())";
    
      $result = $conn->query($sql);  
      $result = $conn->query($sql2);  
      
      echo "<script>alert('Meter added successfully')</script>";
  }else{
    echo "<script>alert('Meter already exist')</script>";
  }
}
function getMeters($conn):array{
 $sql = "SELECT * FROM meters";

  $result = $conn->query($sql);  
  $data = [];
  while($row = $result->fetch_assoc()) {
    array_push($data, $row);  
  }

  return $data; 
}
function getMeterById($conn, $meter_id):array{
 $sql = "SELECT * FROM meters WHERE meter_id = $meter_id";

  $result = $conn->query($sql);  
  $data = $result->fetch_assoc();

  return $data; 
}

function getConsumptionDataByMeterID($conn, $meter_id):array{
  $sql = "SELECT * FROM consumption_data WHERE meter_id = $meter_id";
  $result = $conn->query($sql);
  $data = $result->fetch_assoc();
  return $data;
}
function addConsumptionAmount($conn, $amount, $meter_id):bool{
  $sqlBalanceCheck = "SELECT balance FROM consumption_data WHERE meter_id = $meter_id";
  $resultBalanceCheck = $conn->query($sqlBalanceCheck);
  $data = $resultBalanceCheck->fetch_assoc();
  var_dump($data);
  // print_r($data); 
  if($data["balance"] > $amount){
    $newBalance = $data["balance"] - $amount;
    $sql = "UPDATE consumption_data SET units_consumed = $amount, balance=$newBalance, consumption_date = UTC_DATE(), consumption_time = UTC_TIME() WHERE  meter_id = $meter_id";
    $result = $conn->query($sql);
    echo $conn->error;
    var_dump($result) ;
    return $result;
  }else{
    echo "<script type='text/javascript'>alert('Balance to low, Recharge immediately');</script>";
    
    return false;
  }
}