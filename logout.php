<?php 
    require "include/common_func.php";
    
    session_start();
    session_destroy();
    RedirectTo("login.php");
?>