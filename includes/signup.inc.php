<?php
  include('dbh.inc.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['signup-submission'])){
      $first =  $_POST['user_firstname'];
      $last = $_POST['user_lastname'];
      $email = $_POST['email'];
      $username = $_POST['uid'];
      $password = $_POST['pwd'];
      // Error Handle
      // check for empty fields
      if(empty($first) || empty($last) || empty($email) || empty($username) || empty($password)){
        header("Location: ../signup.php?signup=empty");
        exit();
      } else {
        // Check if inputs characters are valid
        if(!preg_match("/^[a-zA-Z]*$/" , $first) || !preg_match("/^[a-zA-Z]*$/" , $last)){
          header("Location: ../signup.php?signup=invalid");
          exit();
        }
        else{
          if(!filter_var( $email , FILTER_VALIDATE_EMAIL)){
            header("Location: ../signup.php?signup=email");
            exit();
          }else {
            $sql = " SELECT * FROM users WHERE user_uid ='$username'";
            $result = mysqli_query($conn , $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0){
              header("Location: ../signup.php?signup=userTaken");
              exit();
            }
            else{
              // Hashing password
              $hash_pwd = password_hash( "$password", PASSWORD_DEFAULT);
              $sql = "INSERT INTO users (user_first , user_last , user_email , user_uid , user_pwd )
              VALUES ('$first' , '$last' , '$email' , '$username' , '$hash_pwd')";
              mysqli_query($conn , $sql);

            }
          }
        }
      }
  }
  else {
    header("Location: ../signup.php");
    exit();
  }

}
else {
  header("Location: ../signup.php");
  exit();
}
