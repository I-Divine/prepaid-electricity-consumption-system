<?php
require_once("./template/app_header.php");
?>
<?php 
require_once("../app/meter.php");
require_once("../app/db_connection.php");
$data = getMeters($conn);
?>
<div class="p-12 font-['Poppins',sans-serif]">
  <h1 class="text-2xl text-[#3d692c]">Connected meters</h1>
  <?php
  require_once("../app/auth.php");
  
  check_login();
  foreach ($data  as $row) {
    $meter_id = $row["meter_id"];
  echo "<div class='my-4 flex justify-between p-4 text-xl text-[#2c4324] rounded-xl bg-[#afd89d]'>";
    echo "<p>";
    echo "Meter number :". $row["meter_number"];
    echo "<br>";
    echo "Meter type :". $row["meter_type"];
    echo "</p>";
    echo "<a class='bg-[#3d692c] hover:bg-[#d3eac8] hover:text-[#3d692c] text-[#d3eac8] rounded-xl p-2 rounded-xl flex items-center ' href='./view_meter.php?meter_id=$meter_id'>View meter</a>";
    echo "</div>";
  }
  
  ?>

  <div class="my-12"></div>
  <a href="/prepaid-electricity-system/views/add_meter.php" class="bg-[#3d692c] hover:bg-[#d3eac8] hover:text-[#3d692c] text-[#d3eac8] p-4 rounded-xl rounded border-0 ">Add meter</a>


</div>
<?php
require_once("./template/footer.php");

?>