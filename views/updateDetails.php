<?php require_once("./template/app_header.php")?>
<div class="text-xl m-4">
  <h1 class="text-center text-3xl mb-4">Update details</h1>
   <form method="POST" class="w-1/2 min-w-max m-4 p-8 rounded-3xl text-[#2c4324] bg-[#afd89d] flex justify-between m-auto gap-4">
    <div class="grid w-full gap-4">
      <input type="text" name="newPhoneNumber" value="<?echo $_GET["phoneNumber"]?>"
      class="p-2 rounded-xl w-full bg-[#f6faf3] text-[#2c4324]" required>
      <input type="text" name="newAddress" maxlength="11" minlength="10"  value="<?echo $_GET["address"]?>"
      class="p-2 rounded-xl w-full bg-[#f6faf3] text-[#2c4324]" required>
</div>
    <button type="submit" class="bg-[#3d692c] hover:bg-[#d3eac8] hover:text-[#3d692c] text-[#d3eac8] rounded-xl py-4 px-6">Enter</button>
    
  </form>
</div>
 <?php require_once("./template/footer.php")?>
<?php
require_once("../app/user.php");
require_once("../app/db_connection.php");
if(isset($_POST["newPhoneNumber"]) || isset($_POST["newAddress"])){
  if($_POST["newPhoneNumber"] !== $_GET["phoneNumber"] || $_POST["newAddress"] !== $_GET["address"]){
    updateUser($conn, $_GET["userId"], $_POST);
    header("Location: http://localhost/prepaid-electricity-system/views/profile.php?user_id=". $_GET["userId"] ."");
    
  }
}
?>