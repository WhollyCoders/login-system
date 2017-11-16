<?php
if(!isset($_GET['username']) || !isset($_GET['code'])){
  echo('There has been an error...<br><br><a href="./register.php">Register</a>');
}else{
  $data = array(
    'username'  =>      $_GET['username'],
    'code'      =>      $_GET['code']
  );
}
?>