<?php 
    require "include/comment_model.php";
    require "include/common_func.php";

    $approvedBy = "dummy1";
    //echo $_GET["id"].$_GET["status"];

    if(ChangeApproval($_GET["id"], $_GET["status"], $approvedBy)){
        RedirectTo("comment_show.php");
    }
?>