<?php
  class Account {

    private $errorArray;

    public function __construct() {
      $this->errorArray = array();
    }

    public function register($un, $fn, $ln, $em, $em2, $pw, $pw2) {
      $this->validateUsername($un);
      $this->validateFirstName($fn);
      $this->validateLastName($ln);
      $this-> validateEmails($em, $em2);
      $this->validatePasswords($pw, $pw2);

      if(empty($this->errorArray)) {
        return true;
      } else {
        return false;
      }
    }

    public function getError($error) {
      if(!in_array($error, $this->errorArray)) {
        $error = "";
      }
      return "<span class='errorMessage'>$error</span>";
    }

    private function validateUsername($un) {

      //checking username length
      if(strlen($un) < 5 || strlen($un) > 20) {
        array_push($this->errorArray, Constants::$usernameLength);
        return;
      }

      //check if username already exists.

    }

    //checking First Name length
    private function validateFirstName($fn) {
      if(strlen($fn) < 2 || strlen($fn) > 20) {
        array_push($this->errorArray, Constants::$firstNameLength);
        return;
      }
    }
    
    //checking Last Name length
    private function validateLastName($ln) {
      if(strlen($ln) < 2 || strlen($ln) > 20) {
        array_push($this->errorArray, Constants::$lastNameLength);
        return;
      }
    }
    
    private function validateEmails($em, $em2) {
      //checking email and confirm email are matching
      if($em !== $em2) {
        array_push($this->errorArray, Constants::$passwordDoNoMatch);
        return;
      }

      //checking email validation
      if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
        array_push($this->errorArray, Constants::$emailInvalid);
        return;
      }

      //checking if emaili is already exists
      
    }
    
    private function validatePasswords($pw, $pw2) {
      if($pw !== $pw2) {
        array_push($this->errorArray, Constants::$passwordDoNoMatch);
        return;
      }

      if(preg_match('/[^A-Za-z0-9]/', $pw)) {
        array_push($this->errorArray, Constants::$passwordAlphanumeric);
        return;
      }

      if(strlen($pw) < 6 || strlen($pw) > 16) {
        array_push($this->errorArray, Constants::$passwordLength);
        return;
      }
    }

    
  }
?>