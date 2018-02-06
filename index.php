<?php
// Check if the user come from POST Request





  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $user_name = filter_var( $_POST['user'] , FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['Email'] , FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['Phone'] ,FILTER_SANITIZE_NUMBER_INT );
    $message = filter_var($_POST['message'] ,FILTER_SANITIZE_STRING);
    echo $user_name;
    echo $email;
    echo $phone;
    echo $message;

  $FormErrors  = array();
  if(strlen($user_name) < 4){
    $user_error = "Your user name should be more than or equal 4";
    $user_name = " ";
  }
  if(strlen($email) < 10){
    $mail_error = "Please Enter Valid Mail";
    $email = " ";
  }
  if(strlen($phone) < 11){
    $phone_error = "Your Phone number should be at least 11 numbers";
    $phone = " ";
  }
  if(strlen($message) < 20){
    $message_error = "Your Message Should Contain More Than 20 Characters";
    $message = " ";
  }
}

 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Contact Form</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width , initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab" >
        <link rel="stylesheet" href="css//style.css">
        <meta >
    </head>
    <body>
    <div class="container">
        <h1 class="text-center"> Contact Me</h1>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" >
          <div class="form-group">
                <input class="form-control" type="name" name="user" placeholder= "Enter Your Name"
                value="<?php if(isset($user_name))echo $user_name ?>" required>
                <i class="fa fa-user fa-fw"></i>
                <?php  if(isset($user_error)){ ?>
                  <div class="error alert alert-warning">
                    <?php  echo "<p>" . $user_error ."</p>"; ?>
              </div>
            <?php } ?>
            <div class="alert alert-warning  custom-alert"><p>Your user name should be more than or equal 4</p></div>
        </div>
                    <input class="form-control" type="email" name="Email" placeholder="Enter Valid Mail"
                    required value="<?php if(isset($email))echo $email ?>">
                    <i class="fa fa-envelope fa-fw"></i>
                    <?php  if(isset($mail_error)){ ?>
                      <div class="error alert alert-warning">

                        <?php  echo "<p>" . $mail_error ."</p>"; ?>
                  </div>
                <?php } ?>
                <input class="form-control" type="tel" name="Phone" value="<?php if(isset($phone))echo $phone ?>"
                 placeholder="Enter Your Phone" required>
                <i class="fa fa-phone fa-fw"></i>
                <?php  if(isset($phone_error)){ ?>
                  <div class="error alert alert-warning">

                    <?php  echo "<p>" . $phone_error ."</p>"; ?>
              </div>
            <?php } ?>

            <textarea class="form-control" name="message" value="<?php if(isset($message))echo $message ?>"

             placeholder="Enter Your Holder"></textarea>
              <?php  if(isset($message_error)){ ?>
                <div class="error alert alert-warning">

                  <?php  echo "<p>" . $message_error ."</p>"; ?>
            </div>
          <?php } ?>
            <input class="btn btn-success btn-block" type="submit" value="Send Message">
            <i class="fa fa-send fa-fw"></i>

        </form>

    </div>
    <script
        src="http://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="js/custom.js"></script>
    </body>
</html>
