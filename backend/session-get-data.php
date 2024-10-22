<?php
// used to manage information aross different pages
session_start();
if(isset($_SESSION['user_name'])){
    echo "welcome" . $_SESSION['user_name'];
    echo "<br>";
}
else{
    echo "please login to continue";
}

?>