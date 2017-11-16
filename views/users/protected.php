<?php
session_start();
require('./config.php');
if(!isset($_SESSION['username']))
{
  redirect('../login/');
}
?>
<h1>Protected Content</h1>