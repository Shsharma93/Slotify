<?php
  class Account {

    private $con;
    private $errorArray;

    public function __construct($con) {
      $this->con = $con;
      $this->errorArray = array();
    }

    public function register($un, $fn, $ln, $em, $em2, $pw, $pw2) {
      $this->validateUsername($un);
      $this->validateFirstName($fn);
      $this->validateLastName($ln);
      $this-> validateEmails($em, $em2);
      $this->validatePasswords($pw, $pw2);

      if(empty($this->errorArray)) {
        return $this->insertUserDetails($un, $fn, $ln, $em, $pw);
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

    private function insertUserDetails($un, $fn, $ln, $em, $pw) {
      $encryptPw = md5($pw);
      $profilePic = "assets/images/profile-pic/user1.png";
      $date = date("Y-m-d");
      
      $result = mysqli_query($this->con, "INSERT into users values('', '$un', '$fn', '$ln', '$em', '$encryptPw', '$date', '$profilePic')");
      
      return $result;
    }

    private function validateUsername($un) {

      //checking username length
      if(strlen($un) < 5 || strlen($un) > 20) {
        array_push($this->errorArray, Constants::$usernameLength);
        return;
      }

      //check if username already exists.
      $checkUsernameQuery = mysqli_query($this->con, "SELECT username from users WHERE username = '$un'");

      if(mysqli_num_rows($checkUsernameQuery) != 0) {
        array_push($this->errorArray, Constants::$usernameExists);
        return;
      }

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
      $checkEmailQuery = mysqli_query($this->con, "SELECT email from users WHERE email = '$em'");

      if(mysqli_num_rows($checkEmailQuery) != 0) {
        array_push($this->errorArray, Constants::$emailExists);
        return;
      }
      
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