<?php
require_once("./template/app_header.php");
?>
<div class="text-xl m-4">
  <h1 class="text-center text-3xl mb-4">Recharge</h1>
   <form method="POST" class="w-1/2 min-w-max m-4 p-8 rounded-3xl text-[#2c4324] bg-[#afd89d] flex justify-between m-auto gap-4">
    <div class="row">
      <input type="number" name="amount_recharge" placeholder="Recharge amount . N"
      class="p-2 rounded-xl w-full bg-[#f6faf3] text-[#2c4324]" required>
      <strong class = "block text-red-500 text-lg">N1500 -> 5kW.h</strong>
</div>
    <button type="submit" class="bg-[#3d692c] hover:bg-[#d3eac8] hover:text-[#3d692c] text-[#d3eac8] rounded-xl py-4 px-6">Enter</button>
    
  </form>
</div>

<?php
$meter_id = $_GET["meter_id"];
require_once("../app/recharge.php");
require_once("../app/meter.php");
require_once("../app/db_connection.php");

if(isset($_POST["amount_recharge"])){
  $amount_recharge = $_POST["amount_recharge"];
  rechargeBalance($conn, $amount_recharge,$meter_id);
} 
?>
 <?php require_once("./template/footer.php")?>
