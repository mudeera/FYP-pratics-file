<?php
// used to manage information aross different pages
session_start();

session_unset();
session_destroy();
    header("location: login.php");
    exit;
// echo "<br> you have been logged out ";

?>