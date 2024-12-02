<?php
require_once("./template/app_header.php");
?>

<?php
require_once("../app/db_connection.php");
require_once("../app/meter.php");
require_once("../app/recharge.php");

if((!isset($_GET["meter_id"]))){
    echo "<p>Page is not found !!!</p>";
}
$meter_id = $_GET["meter_id"];
$meter_data = getMeterById($conn,$meter_id);
$consumption_data = getConsumptionDataByMeterID($conn,$meter_id);
// print_r($meter_data);
?>
<div class="text-xl m-4 rounded-xl bg-[#afd89d] p-4">
  <h1>Meter details</h1>
  <p>Meter number : <?echo $meter_data["meter_number"]?></p>
  <p>Meter type : <?echo $meter_data["meter_type"]?></p>
</div>
<div class="text-xl mx-4 my-8 rounded-xl bg-[#afd89d] p-4">
  <h1 >Consumption data</h1>
  <p >
    Consumed : <? echo $consumption_data["units_consumed"] ?> <span class="text-[#4c8435]">kWh</sp> 
  </p>
  <p >
    Balance : <? echo $consumption_data["balance"] ?> <span class="text-[#4c8435]">kWh</span>
  </p>
  <div class="flex justify-between mt-4">
  <a class="bg-[#3d692c] hover:bg-[#d3eac8] hover:text-[#3d692c] text-[#d3eac8] rounded-xl py-4 px-6  " href="./add_consumption_data.php?meter_id=<? echo $meter_id?>">Add Consumed Amount</a>
  <a class="bg-[#3d692c] hover:bg-[#d3eac8] hover:text-[#3d692c] text-[#d3eac8] rounded-xl py-4 px-6  " href="./recharge.php?meter_id=<? echo $meter_id?>">Recharge</a>
</div>
</div>


<div class="text-xl m-4">
  <h1 class="text-center" >Recharge history</h1>
  <?php
$rechargeHistory = getRechargeHistory($conn,$meter_id);
if(!empty($rechargeHistory)){  
  foreach($rechargeHistory as $row){ 
    echo "<div class='flex gap-8 p-4 justify-between mb-2 rounded-xl bg-[#afd89d] '>";
    echo "<p> Amount(N) :".$row["amount_recharged"] . "</p>";
    echo "<p> time :".$row["recharge_time"]. "</p>";
    echo "<p> date :".$row["recharge_date"]. "</p>";
    echo "</div>";
  }

}else{
  echo "no history";
}
?>
</div>
<?php

?>
<?php
require_once("./template/footer.php");
?>