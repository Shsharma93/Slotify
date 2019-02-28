<?php

function sanitizeUsername($input) {
  $input = strip_tags($input);
  $input = str_replace(" ", "", $input);
  return $input;
}

function sanitizePassword($input)
{
  $input = strip_tags($input);
  return $input;
}

function sanitizeNames($input)
{
  $input = strip_tags($input);
  $input = str_replace(" ", "", $input);
  $input = ucfirst(strtolower($input));
  return $input;
}




if (isset($_POST['register'])) {
  echo 'Register button was pressed!';

  $un = sanitizeUsername($_POST['username']);
  $fn = sanitizeNames($_POST['firstName']);
  $ln = sanitizeNames($_POST['lastName']);
  $em = sanitizeNames($_POST['email']);
  $em2 = sanitizeNames($_POST['email2']);
  $pw = sanitizePassword($_POST['password']);
  $pw2 = sanitizePassword($_POST['password2']);

  $wasSuccesful = $account->register($un, $fn, $ln, $em, $em2, $pw, $pw2);

  if($wasSuccesful) {
    //echo 'Sign up is succesful';
    header("Location: index.php");
  }
  
}

?>