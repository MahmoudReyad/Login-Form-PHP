        <?php
          include_once 'header.php';
         ?>
        <!--Start Login Form  -->
        <section class="main-section text-center">
          <div class="container login-container">
            <div class="row">
              <div class="col-xs-12">
                <form class="login-form" method="POST" action="">
                  <input type="text" class="form-control" name="uid" placeholder="Username/E-mail">
                  <input type="password"  class="form-control" name="pwd" placeholder="Password">
                  <input type="submit" class="form-control btn btn-primary btn-block" name="login-submission">
                </form>
              </div>
            </div>
          </div>
        </section>
        <?php
        include_once 'footer.php';
         ?>
