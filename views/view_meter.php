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
<div class="text-xl m-4">
  <h1>Meter details</h1>
  <p>Meter number : <?echo $meter_data["meter_number"]?></p>
  <p>Meter type : <?echo $meter_data["meter_type"]?></p>
</div>
<div class="text-xl m-4">
  <h1 >Consumption data</h1>
  <form method="POST" class="flex gap-4">
    <input type="number" name="units_consumed" placeholder="Todays usage . kWh"
    class="rounded p-2 border-2 border-black" required>
    <button type="submit" class="bg-lime-500 p-2 rounded text-white">Enter</button>
  </form>
  <p >
    Consumed : <? echo $consumption_data["units_consumed"] ?> <span class="text-lime-500">kWh</sp> 
  </p>
  <p >
    Balance : <? echo $consumption_data["balance"] ?> <span class="text-lime-500">kWh</span>
  </p>
</>
</div>

<div class="text-xl m-4">
  <h1>Recharge</h1>
   <form method="POST" class="flex gap-4">
    <input type="number" name="amount_recharge" placeholder="Recharge amount . N"
    class="rounded p-2 border-2 border-black" required>
    <button type="submit" class="bg-lime-500 p-2 rounded text-white">Enter</button>
    
  </form>
  <strong class = "block text-red-500 text-lg">N1500 -> 5kW.h</strong>
</div>
<div class="text-xl m-4">
  <h1>Recharge history</h1>
  <?php
$rechargeHistory = getRechargeHistory($conn,$meter_id);
if(!empty($rechargeHistory)){  
  foreach($rechargeHistory as $row){ 
    echo "<div class='flex gap-8'>";
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
if(isset($_POST["units_consumed"])){
  $units_consumed = $_POST["units_consumed"];
  addConsumptionAmount($conn,$units_consumed,$meter_id);
} 
if(isset($_POST["amount_recharge"])){
  $amount_recharge = $_POST["amount_recharge"];
  rechargeBalance($conn, $amount_recharge,$meter_id);
} 
?>
<?php
require_once("./template/footer.php");
?>