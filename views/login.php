<?php require_once("./template/login_header.php")?>
<div class=" w-full h-full  bg-[url('https://img.freepik.com/free-photo/electricity-high-voltage-pole-sky_1127-2985.jpg?t=st=1732837566~exp=1732841166~hmac=5d3d382ac7a6d9456413107df4d76c4169f2f496055d63e884508cbce9f57bd1&w=1800')]">
  <div class="backdrop-brightness-75 backdrop-blur-sm flex justify-end  w-full h-full font-['Poppins',sans-serif] ">
    <form method="POST" action="" class="w-1/3 m-4 p-8 rounded-3xl bg-white">

        <legend class="text-2xl text-center font-bold text-lime-500">Login</legend>
  
        <label for="name">Username:</label><br>
        <input type="text" id="username" name="username" required class="p-2 rounded w-full border-2 border-lime-400"><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required class="p-2 rounded w-full border-2 border-lime-400"><br><br>

        <button type="submit" class="bg-lime-400 rounded p-2 text-white m-auto">Sign Up</button>
    </form>
  </div>
  
</div>
<?php 
require("../app/db_connection.php");
require("../app/auth.php");
if(isset($_POST["username"])){
  authenticate_user($_POST, $conn);

}
?>
 <?php require_once("./template/footer.php")?>