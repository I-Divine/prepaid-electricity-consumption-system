<?php
require_once("./template/app_header.php");
?>

<?php
require_once("../app/db_connection.php");
require_once("../app/user.php");

if(!isset($_GET["user_id"])){
  echo "<p class='text-xl'>User not found</p>";
}

$user_id = $_GET["user_id"];
$user = getUser($conn,$user_id);
?>
<div class="flex flex-col gap-2 text-xl text-[#2c4324] m-4 rounded-xl bg-[#afd89d] p-4">

  <p>Name : <? echo $user["name"]?> </p>
  <p>Username : <? echo $user["username"]?> </p>
  <p>Address : <? echo $user["address"]?> </p>
  <p>Phone number : <? echo $user["contact_number"]?> </p>
  <p>Email : <? echo $user["email"]?> </p>
  <p>Account Number : <? echo $user["account_number"]?> </p>
  <p class="flex gap-4">
    <a href="./updateDetails.php?phoneNumber=<?echo $user['contact_number']?>&userId=<?echo $user_id?>&address=<?echo $user['address']?>"
    class="bg-[#3d692c] hover:bg-[#d3eac8] hover:text-[#3d692c] text-[#d3eac8] rounded-xl py-4 px-6">
      Update Details
    </a>
    
  </p>
</div>
  
<?php
require_once("./template/footer.php");
?>