<?php
function generateRechargeCode($data) {
    // Generate a random string of 6 alphanumeric characters
    $randomString = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz"), 0, 6);

    // Encode the meaningful data (e.g., user ID) into Base64 format
    $encodedData = base64_encode($data); // This could be anything, e.g., user info or transaction data

    // Construct the final code (Prefix + Random + Encoded Data + Suffix)
    $code = '{$randomString}-{$encodedData}';

    return $code;
}

function getEnergyAmount($amount){
  $energyAmount = ($amount/1500)*5;
}

?>


<?php
function rechargeBalance($conn,$amount, $meter_id) {
  // include ("./meter.php");
  $recharge_code = generateRechargeCode("meterId:{$meter_id}-amount:{$amount}");
  $energy_amount = getEnergyAmount($amount);
  $balance = getConsumptionDataByMeterID($conn, $meter_id)["balance"];
  $new_balance = $energy_amount + $balance;
  $sql = "INSERT INTO recharge_history (meter_id, recharge_date, recharge_time, amount_recharged, recharge_code) VALUES ($meter_id, UTC_DATE(), UTC_TIME(), $amount, 'bbb')";
  $sql2 = "UPDATE consumption_data SET balance = 2500.00 WHERE meter_id = $meter_id";
  $result1 = $conn->query($sql);
  $result2 = $conn->query($sql2);
  echo $conn->error;
  var_dump($result1); 
  var_dump($result2);
}

function getRechargeHistory($conn, $meter_id) {
  $sql = "SELECT * FROM recharge_history WHERE meter_id = $meter_id";
  $result = $conn->query($sql);
   $data = [];
  while($row = $result->fetch_assoc()) {
    array_push($data, $row);  
  }

  return $data; 

}
?>
