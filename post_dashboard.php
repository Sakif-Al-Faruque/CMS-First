<?php 
    require "header.php";
    require "include/db_operation.php";

?>

    <!-- header starts -->
    <header>
        <div class="container my-2">
            <div class="row">
                <div class="col-md-12 bg-dark py-2">
                    <h1 class="text-light"><i class="fa-solid fa-bars-progress text-primary"></i></i> Manage Post</h1>
                </div>
            </div>
        </div>
    </header>
    <!-- header ends -->

    <section class="manage-post">
        <div class="container">
            <div class="row py-3 mb-3 bg-dark">
                <div class="col-md-3"><a class="btn btn-primary btn-block" href="#"><i class="fa-regular fa-file"></i></i> Add New Post</a></div>
                <div class="col-md-3"><a class="btn btn-warning btn-block" href="#"><i class="fas fa-file-alt"></i></i> Add New Category</a></div>
                <div class="col-md-3"><a class="btn btn-info btn-block" href="#"><i class="fa-solid fa-user-plus"></i> Add New Admin</a></div>
                <div class="col-md-3"><a class="btn btn-success btn-block" href="#"><i class="far fa-comment"></i> Approve Comments</a></div>
            </div>
        </div>
    </section>

    <section class="show-post">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Post Title</th>
                                <th scope="col" >Category</th>
                                <th scope="col" colspan="3">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $serial = 0; 
                                foreach(GetAllData("post") as $data){
                                    /* echo $data["id"]."<br>";
                                    echo $data["post_title"]."<br>";
                                    echo $data["category_title"]."<br>"; */
                            ?>
                            <tr>
                                <th scope="row"><?php echo ++$serial; ?></th>
                                <td><?php 
                                    //limiting the texts
                                    if(strlen($data["post_title"]) > 20){
                                        echo substr($data["post_title"], 0, 18)." ... ";
                                    }else{
                                        echo $data["post_title"];
                                    }
                                ?></td>
                                <td><?php 
                                    if(strlen($data["category_title"]) > 20){
                                        echo substr($data["category_title"], 0, 18)." ... ";
                                    }else{
                                        echo $data["category_title"];
                                    }
                                    //echo $data["category_title"]; 
                                ?></td>
                                <td><a href="post_edit.php?id=<?php echo $data["id"]; ?>" class="btn btn-block btn-warning">Edit</a></td>
                                <td><a href="post_delete.php?id=<?php echo $data["id"]; ?>" class="btn btn-block btn-danger">Delete</a></td>
                                <td><a href="post_preview.php?id=<?php echo $data["id"]; ?>" class="btn btn-block btn-primary">Preview</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>    
                </div>
            </div>
        </div>
    </section>

    <!-- <main>
        <div class="container">
            <p class="text-primary">hello</p>
        </div>
    </main> -->
<?php require "footer.php"; ?>