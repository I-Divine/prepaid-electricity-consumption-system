<?php
if(session_status()==PHP_SESSION_NONE){
  session_start();
}

function updateAccessLog($message, $conn){
  $sql = "INSERT INTO system_logs (log_date, log_time, log_message) VALUES (UTC_DATE, UTC_TIME, '$message')";

  $conn->query($sql); 
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
    $message = "Register user with username $username";
    updateAccessLog($message, $conn);
  }else {
    echo "error occured";
    throw new Exception("error eccured with querys");
  }
} 

function authenticate_user($auth_request, $conn){
 
  $username = $auth_request["username"];
  $password = $auth_request["password"];

  $query = "SELECT * FROM users WHERE username = '$username'; ";
  echo "what 1";
  $result = $conn->query($query);
  updateAccessLog("user with username : $username, attempted login", $conn);
  if ($result->num_rows > 0) {
    echo "what";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      if($row["username"] == $username and password_verify($password,$row["password"] )){
        echo "what";
        updateAccessLog("user with username : $username, logged in succesfully", $conn);
        $_SESSION["username"] = $row["username"];
        $_SESSION["user_id"] = $row["user_id"];
        header("Location: http://localhost/prepaid-electricity-system/views/home.php");
        break;
        return;
    }
  }

}
updateAccessLog("user with username : $username, login failed", $conn);
echo "<script type='text/javascript'>alert('Your username or password is incorrect');</script>";
        
} 

function check_login(){
  if(isset($_SESSION["username"]) && $_SESSION["user_id"]){

    return;
  }else{
    header("Location: http://localhost/prepaid-electricity-system/views/login.php");
  }
}