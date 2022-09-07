<?php 
session_start();
require "include/common_func.php"; 
require "include/admin_model.php"; 

?>


<?php 

 if(isset($_POST["signin"])){
    if(AdminLogIn($_POST["uname"], $_POST["pass"])){
        $_SESSION["username"] = $_POST["uname"];

        if(isset($_SESSION["TrackUrl"])){
            RedirectTo($_SESSION["TrackUrl"]);
        }else{
            RedirectTo("dashboard.php"); //default
        }

        
    }else{
        $_SESSION["msg-err"] = "Authentication Failed !!!";
        RedirectTo("login.php");
    }
}
?>


