<?php 
session_start();
require "include/common_func.php"; 
require "include/category_model.php"; 

?>

<?php 
    if(isset($_POST["publish"])){
        $error = "";

        //data assigning and validation
        $title = "";
        $author = "dummy1";
        $d = date("d-m-Y"); //get the date
        //echo $d;

        if(empty($_POST["Title"])){
            $error = "Title is required";
        }else if(strlen($_POST["Title"]) < 2 || strlen($_POST["Title"]) > 49){
            $error = "Title should have more than 2 character and less than 50 characters";
        }else{
            $title = $_POST["Title"];
        }
        
        //error handling
        if($error === ""){
            if(InsertCategory($title, $author, $d)){
                $_SESSION["msg-success"] = "Added!";
            }else{
                $_SESSION["msg-err"] = "Database error";
            }
            
        }else{
            $_SESSION["msg-err"] = $error;
        }

        RedirectTo("category.php");
    }
    //$connectingDB->lastInsertId() -> go through the details of it
?>