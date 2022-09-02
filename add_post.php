<?php 
session_start();
require "include/common_func.php"; 
require "include/post_model.php"; 

?>

<?php 
    
        $error = "";

        //data assigning and validation
        $pst_title = "";
        $cat_title = "";
        $pst_writtings = "";
        $img_name = "";
        $author = "dummy1";
        $d = GetCurrentDateTime(); //get the date and time
        //echo $d;

        if(empty($_POST["pst-Title"])){
            $error .= "Title is required | ";
        }else if(strlen($_POST["pst-Title"]) < 2 || strlen($_POST["pst-Title"]) > 49){
            $error .= "Title should have more than 2 character and less than 50 characters | ";
        }else{
            $pst_title = $_POST["pst-Title"];
        }

        if(empty($_POST["cat-Title"])){
            $error .= "Category is required | ";
        }else if(strlen($_POST["cat-Title"]) < 2 || strlen($_POST["cat-Title"]) > 49){
            $error .= "Title should have more than 2 character and less than 50 characters | ";
        }else{
            $cat_title = $_POST["cat-Title"];
        }
        
        if(empty($_POST["post-writtings"])){
            $error .= "Writtings is required | ";
        }else if(strlen($_POST["post-writtings"]) < 1 || strlen($_POST["post-writtings"]) > 199){
            $error .= "Title should have more than 1 character and less than 200 characters | ";
        }else{
            $pst_writtings = $_POST["post-writtings"];
        }

        //modified
        if(isset($_POST["img_name"])){
            $img_name = $_POST["img_name"];
        }else{
            $target_dir = "uploads/post/";
            $target_file = $target_dir . basename($_FILES["file-img"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["file-img"]["tmp_name"]);

            if($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $error .= " | File is not an image. | ";
                $uploadOk = 0;
            }
            

            // Check if file already exists
            if (file_exists($target_file)) {
                $error .= " | Sorry, file already exists. | ";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["file-img"]["size"] > 500000) {
                $error .= " | Sorry, your file is too large. | ";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                $error .= " | Sorry, only JPG, JPEG, PNG & GIF files are allowed. | ";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk === 0) {
                $error .= " | Sorry, your file was not uploaded. | ";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["file-img"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["file-img"]["name"])). " has been uploaded.";
                    $img_name = $_FILES["file-img"]["name"]; //print something.jpg
                } else {
                    $error .= " | Sorry, there was an error uploading your file. | ";
                }
            }
        }

        // echo $pst_writtings.$cat_title.$pst_title.$img_name;

            
        //error handling and data operation
        if(isset($_POST["publish"])){
            if($error === ""){
                
                if(InsertPost($pst_title, $cat_title, $author, $pst_writtings, $img_name, $d)){
                    $_SESSION["msg-success"] = "Added!";
                }else{
                    $_SESSION["msg-err"] = "Database error";
                }
                
            }else{
                $_SESSION["msg-err"] = $error;
            }
            RedirectTo("post.php");

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
    //$connectingDB->lastInsertId() -> go through the details of it
?>


<!-- for update -->
<?php 
    /* if(isset($_POST["update"])){
        $error = "";

        //data assigning and validation
        $pst_title = "";
        $cat_title = "";
        $pst_writtings = "";
        $img_name = "";
        $author = "dummy1";
        $d = GetCurrentDateTime(); //get the date and time
        //echo $d;

        if(empty($_POST["pst-Title"])){
            $error .= "Title is required | ";
        }else if(strlen($_POST["pst-Title"]) < 2 || strlen($_POST["pst-Title"]) > 49){
            $error .= "Title should have more than 2 character and less than 50 characters | ";
        }else{
            $pst_title = $_POST["pst-Title"];
        }

        if(empty($_POST["cat-Title"])){
            $error .= "Category is required | ";
        }else if(strlen($_POST["cat-Title"]) < 2 || strlen($_POST["cat-Title"]) > 49){
            $error .= "Title should have more than 2 character and less than 50 characters | ";
        }else{
            $cat_title = $_POST["cat-Title"];
        }
        
        if(empty($_POST["post-writtings"])){
            $error .= "Writtings is required | ";
        }else if(strlen($_POST["post-writtings"]) < 1 || strlen($_POST["post-writtings"]) > 199){
            $error .= "Title should have more than 1 character and less than 200 characters | ";
        }else{
            $pst_writtings = $_POST["post-writtings"];
        }

        //modified
        if(isset($_POST["img_name"])){
            $img_name = $_POST["img_name"];
        }else{
            $target_dir = "uploads/post/";
            $target_file = $target_dir . basename($_FILES["file-img"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["file-img"]["tmp_name"]);

            if($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $error .= " | File is not an image. | ";
                $uploadOk = 0;
            }
            

            // Check if file already exists
            if (file_exists($target_file)) {
                $error .= " | Sorry, file already exists. | ";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["file-img"]["size"] > 500000) {
                $error .= " | Sorry, your file is too large. | ";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                $error .= " | Sorry, only JPG, JPEG, PNG & GIF files are allowed. | ";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk === 0) {
                $error .= " | Sorry, your file was not uploaded. | ";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["file-img"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["file-img"]["name"])). " has been uploaded.";
                    $img_name = $_FILES["file-img"]["name"]; //print something.jpg
                } else {
                    $error .= " | Sorry, there was an error uploading your file. | ";
                }
            }
        }

        
        echo $pst_writtings.$cat_title.$pst_title.$img_name;

        //error handling and data operation
        
        if($error === ""){
            $pst_title = "";
            $cat_title = "";
            $pst_writtings = "";
            $img_name = "";
            $author = "dummy1";
            $d = GetCurrentDateTime(); 
            if(InsertPost($pst_title, $cat_title, $author, $pst_writtings, $img_name, $d)){
                $_SESSION["msg-success"] = "Added!";
            }else{
                $_SESSION["msg-err"] = "Database error";
            }
            
        }else{
            $_SESSION["msg-err"] = $error;
        }

        RedirectTo("post.php");
    } */
    //$connectingDB->lastInsertId() -> go through the details of it
?>