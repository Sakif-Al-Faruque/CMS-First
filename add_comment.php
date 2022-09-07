<?php 
session_start();
require "include/common_func.php"; 
require "include/comment_model.php"; 

?>

<?php 
    if(isset($_POST["comment-press"])){
        $commentator = "";
        $commentator_email = "";
        $commentator_content = "";
        $d = GetCurrentDateTime();
        $p = $_POST["post_id"];
        $status = "OFF";

        $error = "";

        if(strlen($_POST["comment-username"]) > 49){
            $error .= " | username should be less than 49 | ";
        }else if(empty($_POST["comment-username"])){
            $error .= " | username is required | ";
        }else{
            $commentator = $_POST["comment-username"];
        }

        if(strlen($_POST["comment-email"]) > 49){
            $error .= " | Email should be less than 49 | ";
        }else if(empty($_POST["comment-email"])){
            $error .= " | Email is required | ";
        }else{
            $commentator_email = $_POST["comment-email"];
        }

        if(strlen($_POST["comment-content"]) > 399){
            $error .= " | content should be less than 399 | ";
        }else{
            $commentator_content = $_POST["comment-content"];
        }

        // echo $commentator.$commentator_email.$commentator_content.$d.$p.$status;

        if($error === ""){
            InsertComment($commentator, $commentator_email, $commentator_content, $d, $status, $p);
        }else{
            $_SESSION["msg-err"] = $error;
        }

        RedirectTo("post_preview.php?id=".$p);
    }

?>