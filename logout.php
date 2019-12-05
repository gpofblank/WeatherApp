<?php
session_start();
   session_unset();
   session_destroy();
header('location:bye.php');
exit();
// start session, unser all session vars, end/destroy session, move over to the bye page.
?>
