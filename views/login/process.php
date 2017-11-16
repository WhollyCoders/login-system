<?php 
require('./config.php');
$User = new User($connection);
if(isset($_POST['login'])){
  
  if(!empty($_POST['email']) && !empty($_POST['password'])){
    
    $email    = validate($_POST['email']);
    $password = validate($_POST['password']);

    $params = array(
      'email'     =>      $email,
      'password'  =>      $password
    );
    
    $User->login($params);
  }
// *** Query Database To Check If Email/Username Exists ***
  $sql = "SELECT * FROM `users` WHERE user_email='$email' LIMIT 1;";
}

?>