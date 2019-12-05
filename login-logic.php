<?php
session_start();
ini_set('display_errors', 'On');
error_reporting(E_ALL);


// If userId is set, connect to the DB and process the login request.
if (isset($_POST["userid"]) && !empty($_POST["userid"])) {

  try {

    include_once("db_connection.php");

    // userId = userid / password = password.
    $userId = $_POST['userid'];
    $password = $_POST['password'];

    // Construct the query for the db.
    $query = "SELECT * FROM weather_users WHERE user_id = :userId";

    // Prepare the query.
    $stmt = $conn->prepare($query);

    // Bind the value(s).
    $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll();
    // $count = $stmt->fetchColumn();

    if ($result) {

      // Fill in - username, password, and flag.
      foreach ($result as $res) {
        $dbUser = $res['user_id'];
        $dbPassword = $res['password'];
        $adminFlag = $res['role'];
      }

      // close the connection to the DB;
      $stmt = null;
      $conn = null;

      if (password_verify($password, $dbPassword) && $dbUser == $userId){
        if ($adminFlag == "Admin" ){
          // admin
          $_SESSION['Role'] = "Admin";
          $_SESSION['LoggedUser'] = $userId;
          header('location:welcome.php');
          exit();
        }
        else {
          // user
          $_SESSION['Role'] = "User";
          $_SESSION['LoggedUser'] = $userId;
          header('location:welcome.php');
          exit();
        }
      }

      else {
        $_SESSION['error'] = "Invalid username or password";
        header('location:index.php');
        exit();
      }

    }
    else {
      $_SESSION['error'] = "The specified user does not exist!";
      header('location:index.php');
      exit();
    }
  }
  // See if an error will be thrown when connecting to the DB and print it.
  catch (PDOException $e) {
    print "Connection to DB failed!: " . $e->getMessage() . "<br/>";
    die();
  }
}
else {
  echo "N0 userid is set";
}
?>
