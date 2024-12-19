<?php 
require_once("./template/app_header.php");
require_once("../app/auth.php");

check_login();
?>
<div class="flex justify-center font-['Poppins',sans-serif]">
  <form method="GET" action="" class="w-1/3 m-4 p-8 rounded-3xl text-[#2c4324] bg-[#afd89d]">

        <legend class="text-2xl text-[#2c4324] text-center font-bold">Add meter</legend>
  
        <label for="meter_number">Meter number:</label><br>
        <input type="text" minlength="10" maxlength="10" id="meter_number" name="meter_number" placeholder="e.g 111111111" required class="p-2 rounded-xl w-full bg-[#f6faf3] text-[#2c4324]"><br><br>

        <label for="meter_type">Choose a meter type:</label>
      <select id="meter_type" class="p-2 rounded-lg bg-[#f6faf3] text-[#2c4324]" name="meter_type">
          <option value="Manual">Manual</option>
          <option value="Smart">Smart</option>
          <option value="Smart v2">Smart v2</option>
      </select>
        <br><br>
<div class="flex justify-center">
  <button type="submit" class="bg-[#3d692c] hover:bg-[#d3eac8] hover:text-[#3d692c] text-[#d3eac8] rounded-xl py-4 px-6  m-auto">Add</button>

</div>
    </form>
</div>

<?php 
require_once("./template/footer.php");
?>
<?php
require_once("../app/meter.php");
require_once("../app/db_connection.php");
if (isset($_GET["meter_number"])) {
addMeter($_GET, $conn);
}

?>