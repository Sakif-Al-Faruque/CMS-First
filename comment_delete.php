<?php 
    require "include/comment_model.php";
    require "include/common_func.php";

    if(DeleteComment($_GET["id"])){
        RedirectTo("comment_show.php");
    }
?>