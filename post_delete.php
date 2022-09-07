<?php 

    require "include/post_model.php";
    require "include/common_func.php";
    
    if(DeletePost($_GET["id"])){
        unlink("uploads/post/".$_GET["p_img"]); //delete image
        RedirectTo("post_dashboard.php");
    }else{
        echo "Something is going wrong !!!";
    }
?>

