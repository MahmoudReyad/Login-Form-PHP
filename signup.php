<?php include_once 'header.php' ?>
<section>
  <div class="container signup-container">
    <div class="row">
      <div class="col-xs-12">
        <form class="signup-form" method="POST" action="includes/signup.inc.phpph">
          <input type="text" class="form-control" name="user_firstname" placeholder="First Name" required>
          <input type="text" class="form-control" name="user_lastname" placeholder="Lasst Name" required>
          <input type="text" class="form-control" name="user_lastname" placeholder="User name" required>
          <input type="email" class="form-control" name="user_firstname" placeholder="E-mail" required>
          <input type="password" class="form-control" name="pwd" placeholder="Password" required>
          <input type="submit" class="form-control btn btn-success btn-block" name="signup-submission">
        </form>
      </div>
    </div>
  </div>
</section>
<?php
  include_once 'footer.php';
 ?>
