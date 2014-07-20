<?php
     session_start();

     $host = $_SERVER['SERVER_NAME'];

    if(!isset($_SESSION["username"])) 
   { 
        header("Location: http://$host/schulfest/authFailed.php");
        exit;
   } 
?>