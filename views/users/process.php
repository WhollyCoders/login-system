<?php 
require('./config.php');
$User = new User($connection);
if(isset($_POST['register'])){
  
    $username   = validate($_POST['username']);
    $password   = validate($_POST['password']);
    $password2  = validate($_POST['password2']);
    $firstname  = validate($_POST['firstname']);
    $lastname   = validate($_POST['lastname']);

    if(
      !empty($username) && 
      !empty($password) && 
      !empty($password2) && 
      !empty($firstname) && 
      !empty($lastname)
      )
    {
      if($password === $password2)
      {
        $params = array(
          'username'      =>      $username,
          'password'      =>      $password,
          'firstname'     =>      $firstname,
          'lastname'      =>      $lastname
        );
        
        $User->register($params);
      }
    }else{echo('There is a problem... Please try again...<br><a href="./register.php">Register</a>');}

}

?>