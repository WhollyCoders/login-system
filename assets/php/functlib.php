<?php
// *** Validate Form Input *** 
function validate($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
// *** PreWrap ***
function prewrap($data)
{
  echo('<pre>');
  print_r($data);
  echo('</pre>');
}
// *** Page Redirect ***
function redirect($path)
{
  header('Location: '.$path);
}
?>