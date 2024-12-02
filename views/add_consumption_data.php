<?php
require_once("./template/app_header.php");
?>
<div class="flex justify-center font-['Poppins',sans-serif]">
  <form method="POST" action="" class="w-1/3 m-4 p-8 rounded-3xl text-[#2c4324] bg-[#afd89d] flex gap-4">
    <input type="number" name="units_consumed" class="p-2 rounded-xl w-full bg-[#f6faf3] text-[#2c4324]" required placeholder="Todays usage . kWh"
    class="rounded p-2 border-2 border-black" required>
    <button type="submit" class="bg-[#3d692c] hover:bg-[#d3eac8] hover:text-[#3d692c] text-[#d3eac8] rounded-xl py-4 px-6">Enter</button>
  </form>
</div>
  <?php
$meter_id = $_GET["meter_id"];
require_once("../app/meter.php");
require_once("../app/db_connection.php");

if(isset($_POST["units_consumed"])){
  $units_consumed = $_POST["units_consumed"];
  addConsumptionAmount($conn,$units_consumed,$meter_id);
} 
  ?>

 <?php require_once("./template/footer.php")?>
