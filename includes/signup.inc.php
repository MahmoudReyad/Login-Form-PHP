<?php
  require('dbh.inc.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['signup-submission'])){
      $first = mysqli_real_escape_string($conn , $_POST['user_firstname']);
      $last = mysqli_real_escape_string($conn ,$_POST['user_lastname']);
      $email = mysqli_real_escape_string($conn ,$_POST['email']);
      $username = mysqli_real_escape_string($conn ,$_POST['user_name']);
      $password = mysqli_real_escape_string($conn ,$_POST['pwd']);
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
            $sql = "select * from login_system where user_uid ='$username'";
            $result = mysqli_query($conn , $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0){
              header("Location: ../signup.php?signup=userTaken");
              exit();
            }
            else{
              // Hashing password
              $hash_pwd = password_hash($password , PASSWORD_DEFAULT);
              $sql = "insert into users ('user_first' , 'uset_last' , 'user_email' , 'user_uid') values ('$first' , '$last' , '$email' , '$username' , '$hash_pwd') ;";
              mysqli_query($conn , $sql);
              header("Location: ../signup.php?signup=success");
              exit();
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
