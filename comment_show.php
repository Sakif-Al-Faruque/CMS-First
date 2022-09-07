<?php session_start(); ?>
<?php 
    require "header.php";
    require "include/db_operation.php";
    require "include/comment_model.php";
    require "include/common_func.php";
?>

<?php 
    if(!isset($_SESSION["username"])){
        $_SESSION["TrackUrl"] = $_SERVER["PHP_SELF"];      
        RedirectTo("login.php");
    }

?>

    <!-- header starts -->
    <header>
        <div class="container my-2">
            <div class="row">
                <div class="col-md-12 bg-dark py-2">
                    <h1 class="text-light"><i class="fa-solid fa-comments text-primary"></i> Manage Comment</h1>
                </div>
            </div>
        </div>
    </header>
    <!-- header ends -->

    <!-- <section class="manage-post">
        <div class="container">
            <div class="row py-3 mb-3 bg-dark">
                <div class="col-md-3"><a class="btn btn-primary btn-block" href="#"><i class="fa-regular fa-file"></i></i> Add New Post</a></div>
                <div class="col-md-3"><a class="btn btn-warning btn-block" href="#"><i class="fas fa-file-alt"></i></i> Add New Category</a></div>
                <div class="col-md-3"><a class="btn btn-info btn-block" href="#"><i class="fa-solid fa-user-plus"></i> Add New Admin</a></div>
                <div class="col-md-3"><a class="btn btn-success btn-block" href="#"><i class="far fa-comment"></i> Approve Comments</a></div>
            </div>
        </div>
    </section> -->

    <section class="show-comment">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center" scope="col" colspan="5">Comment List for Approval</th>
                            </tr>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Commentator</th>
                                <th scope="col" >Comment</th>
                                <th scope="col" colspan="2">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $serial = 0;
                                if(count(RetrieveCommentByApprovalStatus('OFF')) > 0){ 
                                    foreach(RetrieveCommentByApprovalStatus('OFF') as $data){
                                    /* echo $data["id"]."<br>";
                                    echo $data["post_title"]."<br>";
                                    echo $data["category_title"]."<br>"; */
                            ?>
                            <tr>
                                <th scope="row"><?php echo ++$serial; ?></th>
                                <td><?php 
                                    //limiting the texts
                                    /* if(strlen($data["commentator"]) > 20){
                                        echo substr($data["post_title"], 0, 18)." ... ";
                                    }else{ */
                                        echo $data["commentator"];
                                    //}
                                ?></td>
                                <td><?php 
                                    /* if(strlen($data["category_title"]) > 20){
                                        echo substr($data["category_title"], 0, 18)." ... ";
                                    }else{ */
                                        echo $data["comment_content"];
                                    //}
                                    //echo $data["category_title"]; 
                                ?></td>
                                <td><a href="comment_edit.php?id=<?php echo $data["cmnt_id"]; ?>&status=ON" class="btn btn-block btn-warning">Approve</a></td>
                                <td><a href="comment_delete.php?id=<?php echo $data["cmnt_id"]; ?>" class="btn btn-block btn-danger">Delete</a></td>
                            </tr>
                            <?php }}else{ ?>
                                <tr>
                                    <td colspan="5">No row for comments</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>    
                </div>
            </div>
        </div>
    </section>

    <section class="show-comment mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center" scope="col" colspan="5">Approved Comment List</th>
                            </tr>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Commentator</th>
                                <th scope="col" >Comment</th>
                                <th scope="col" colspan="2">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $serial = 0; 
                                if(count(RetrieveCommentByApprovalStatus('ON')) > 0){ 
                                    foreach(RetrieveCommentByApprovalStatus('ON') as $data){
                                    /* echo $data["id"]."<br>";
                                    echo $data["post_title"]."<br>";
                                    echo $data["category_title"]."<br>"; */
                            ?>
                            <tr>
                                <th scope="row"><?php echo ++$serial; ?></th>
                                <td><?php 
                                    //limiting the texts
                                    /* if(strlen($data["commentator"]) > 20){
                                        echo substr($data["post_title"], 0, 18)." ... ";
                                    }else{ */
                                        echo $data["commentator"];
                                    //}
                                ?></td>
                                <td><?php 
                                    /* if(strlen($data["category_title"]) > 20){
                                        echo substr($data["category_title"], 0, 18)." ... ";
                                    }else{ */
                                        echo $data["comment_content"];
                                    //}
                                    //echo $data["category_title"]; 
                                ?></td>
                                <td><a href="comment_edit.php?id=<?php echo $data["cmnt_id"]; ?>&status=OFF" class="btn btn-block btn-warning">Unapprove</a></td>
                                <td><a href="comment_delete.php?id=<?php echo $data["cmnt_id"]; ?>" class="btn btn-block btn-danger">Delete</a></td>
                            </tr>
                            <?php }}else{ ?>
                                <tr>
                                    <td colspan="5">No row for comments</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>    
                </div>
            </div>
        </div>
    </section>

    
<?php require "footer.php"; ?>