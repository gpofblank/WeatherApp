<?php
session_start();
ini_set('display_errors', 'On');
error_reporting(E_ALL);

// if the user is logged in, redirect them to welcome.
if(isset($_SESSION['LoggedUser'])) {
  header('location:welcome.php');
}
?>

<!doctype html>

<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- full-page CSS -->
  <link rel="stylesheet" href="css/full-page.css"/>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap413.css"/>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery331.js" type="text/javascript"></script>
  <script src="js/popper1143.js" type="text/javascript"></script>
  <script src="js/bootstrap413.js" type="text/javascript"></script>

  <!-- Title -->
  <title>Homepage - The Weather App</title>

  <!-- Session Timeout -->
  <?php include_once('session_timeout.php');?>

</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark">
    <a href="index.php"><img src="img/logo50-50.png" class="navbar-brand" alt="The Weather App"></a>
  </nav>
  <section id="cover">
    <div id="cover-caption">
      <div id="container" class="container">
        <div class="row text-white">
          <div class="col-sm-6 mx-auto text-center">
            <h1 class="display-5 pb-5">The Weather App</h1>
            <div class="info-form">
              <form action="login-logic.php" method="POST">
                <div class="form-group text-left">
                  <label for="exampleInputText">User ID</label>
                  <input type="text" name="userid" class="form-control px-2 pb-2" id="exampleInputText1" aria-describedby="emailHelp" placeholder="Enter User ID" maxlength="50" required>
                </div>
                <div class="form-group text-left">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control px-2 pb-2" id="exampleInputPassword1" placeholder="Enter Password" maxlength="50" required>
                </div>
                <!-- Error(s) from back-end -->
                <?php
                if(ISSET($_SESSION['error'])){
                  ?>
                  <div class="alert alert-danger"><?php echo $_SESSION['error']?></div>
                  <?php
                  unset($_SESSION['error']);
                }
                ?>
                <div class="form-text">
                  <p>Don't have an account yet? <a href="register.php" data-toggle="modal" data-target="#registerModal">Register Now!</a></p>
                </div>
                <!-- Register Modal -->
                <div class="modal" id="registerModal">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title text-dark">Half Way There!</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body text-left text-dark">
                        <p>Please, contact an Admin:</p>
                        <ul>
                          <li>Elvis Metodiev</li>
                        </ul>
                        <p>An Admin will sign you up in no time!</p>
                      </div>

                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-success mx-auto" data-dismiss="modal">OK, Close</button>
                      </div>

                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Log in!</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Optional JavaScript -->
</body>
</html>
