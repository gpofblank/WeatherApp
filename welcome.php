<?php
session_start();
ini_set('display_errors', 'On');
error_reporting(E_ALL);

// if the user is not logged in, go to home page.
if(empty($_SESSION['LoggedUser'])) {
  header('location:index.php');
}

// Include functions.php.
include_once("functions.php");
?>

<!doctype html>

<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- full-page CSS -->
  <link rel="stylesheet" href="css/welcome-page.css"/>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap413.css"/>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery331.js" type="text/javascript"></script>
  <script src="js/popper1143.js" type="text/javascript"></script>
  <script src="js/bootstrap413.js" type="text/javascript"></script>

  <!-- Title -->
  <title>Welcome to The Weather App</title>

  <!-- Session Timeout -->
  <?php include_once('session_timeout.php');?>

</head>
<body id="default-bg">
    
  <!-- NAVBAR -->
  <?php
  include_once('navbar.php');
  ?>
  <section id="cover">
    <div id="cover-caption">
      <div id="container" class="container">
        <div class="row pb-5">
          <div class="col-sm-6 mx-auto text-center">
            <h1 class="display-5 pt-5 pb-4 text-white">The Weather App</h1>
            
            <!-- If the session is set and its role is Admin, do the below -->
            <?php
            if (ISSET($_SESSION['Role'])){
              if ($_SESSION['Role'] === "Admin") {
                ?>
                <div id="welcome-message1" class="alert alert-secondary">Welcome back, <?php echo $_SESSION['LoggedUser']?> (ADMIN)</div>
              <?php }} ?>
              <!-- ^^ End of the PHP for Admin -->
              
              <!-- If the session is set and its role is User, do the below -->
              <?php
              if (ISSET($_SESSION['Role'])){
                if ($_SESSION['Role'] === "User") {
                  ?>
                <div id="welcome-message1" class="alert alert-secondary">Welcome back, <?php echo $_SESSION['LoggedUser']?> (USER)</div>
                <?php }} ?>
                <!-- ^^ End of the PHP for Users -->
                
                <div id="welcome-message2" class="alert alert-secondary">Pick a location to start.</div>
                      <?php locationDropDown(); ?>
                </div>
            </div>
          <div class="container" id="responsecontainer" align="center">
        </div>
    </div>
  </section>
      
      <!-- Optional JavaScript -->
      <?php
      echo "<script>";
      include_once('js/ajax.js');
      echo "</script>";
      ?>
    </body>
    </html>
