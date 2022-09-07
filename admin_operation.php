<?php 
session_start();
require "include/common_func.php"; 
require "include/admin_model.php"; 

?>

<?php 
    
        $error = "";

        //data assigning and validation
        $username = "";
        $password = "";
        $added_by = "dummy1";
        $d = GetCurrentDateTime(); //get the date and time
        //echo $d;

        if(empty($_POST["uname"])){
            $error .= "Username is required | ";
        }else if(AdminExsistanceCheck($_POST["uname"])){
            $error .= "Username already exists | ";
        }else if(strlen($_POST["uname"]) < 2 || strlen($_POST["uname"]) > 59){
            $error .= "Title should have more than 2 character and less than 60 characters | ";
        }else{
            $username = $_POST["uname"];
        }

        if(empty($_POST["pass"])){
            $error .= "Username is required | ";
        }else if(strlen($_POST["pass"]) < 4 || strlen($_POST["pass"]) > 59){
            $error .= "Title should have more than 4 character and less than 60 characters | ";
        }else if($_POST["pass"] !== $_POST["re-pass"]){
            $error .= "Password does not match | ";
        }else{
            $password = $_POST["pass"];
        }


        

        // echo $username.$password.$error;

            
        //error handling and data operation
        if(isset($_POST["signup"])){
            if($error === ""){
                
                if(InsertAdmin($username, $password, $added_by, $d)){
                    $_SESSION["msg-success"] = "Added!";
                }else{
                    $_SESSION["msg-err"] = "Database error";
                }
                
            }else{
                $_SESSION["msg-err"] = $error;
            }
            RedirectTo("add_admin.php");

        }else if(isset($_POST["update"])){
            $post_id = $_POST["post_id"];
            if($error === ""){ 
                if(EditPost($post_id, $pst_title, $cat_title, $author, $pst_writtings, $img_name, $d)){
                    $_SESSION["msg-success"] = "Updated!";
                }else{
                    $_SESSION["msg-err"] = "Database error";
                }
                
            }else{
                $_SESSION["msg-err"] = $error;
            }
            RedirectTo("post_edit.php?id=".$post_id);
        }
    
?>