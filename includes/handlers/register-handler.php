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

  $username = sanitizeUsername($_POST['username']);
  $firstName = sanitizeNames($_POST['firstName']);
  $lastName = sanitizeNames($_POST['lastName']);

  $email = sanitizeNames($_POST['email']);
  $email2 = sanitizeNames($_POST['email2']);
  $password = sanitizePassword($_POST['password']);
  $password2 = sanitizePassword($_POST['password2']);


  echo $username;
  echo $lastName;
  echo $firstName;
  echo $email;
  echo $email2;
  echo $password;
  echo $password2;
}



?>