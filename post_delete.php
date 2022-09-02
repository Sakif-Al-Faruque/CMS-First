<?php 

    require "include/post_model.php";
    require "include/common_func.php";
    
    if(DeletePost($_GET["id"])){
        RedirectTo("post_dashboard.php");
    }else{
        echo "Something is going wrong !!!";
    }
?>