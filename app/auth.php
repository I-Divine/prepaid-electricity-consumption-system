<?php
if(session_status()==PHP_SESSION_NONE){
  session_start();
}
function register_user($register_request, $conn){
  $name = $register_request["name"];
  $email = $register_request["email"];
  $username = $register_request["username"];
  $password = password_hash($register_request["password"], PASSWORD_DEFAULT);
  $address = $register_request["address"];
  $phone = $register_request["phone"];
  $accountNo = substr($register_request["phone"], 1) ."_HOMEUSER";

  $query = "INSERT INTO users (name,address, contact_number, email, account_number, username, password)
  VALUES ('$name', '$address', '$phone', '$email', '$accountNo', '$username', '$password')";

  echo $query;

  if($conn->query($query) === TRUE) {
    echo "successful";
  }else {
    echo "error occured";
    throw new Exception("error eccured with querys");
  }
} 

function authenticate_user($auth_request, $conn){
 
  $username = $auth_request["username"];
  $password = $auth_request["password"];

  $query = "SELECT * FROM users WHERE username = '$username'; ";

  $result = $conn->query($query);

  if ($result->num_rows > 0) {
    
    // output data of each row
    while($row = $result->fetch_assoc()) {
      if($row["username"] == $username and password_verify($password,$row["password"] )){
       
        $_SESSION["username"] = $row["username"];
        $_SESSION["user_id"] = $row["user_id"];
        header("Location: http://localhost/prepaid-electricity-system/views/home.php");
        break;
        return;
    }
  }

}
echo "<script type='text/javascript'>alert('Your username or password is incorrect');</script>";
        
} 

function check_login(){
  if(isset($_SESSION["username"]) && $_SESSION["user_id"]){

    return;
  }else{
    header("Location: http://localhost/prepaid-electricity-system/views/login.php");
  }
}