<?php session_start(); ?>
<?php 
    require "header.php";
    require "include/common_func.php";
    require "include/db_operation.php";

?>

    <!-- header starts -->
    <header>
        <div class="container my-2">
            <div class="row">
                <div class="col-md-12 bg-dark py-2">
                    <h1 class="text-light"><i class="fa-regular fa-file text-primary"></i> Post</h1> 
                </div>
            </div>
        </div>
    </header>
    <!-- header ends -->

    <section class="category-submission my-3">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <?php ShowMessage("danger"); ?>
                    <div class="card bg-dark">
                        <div class="card-header">
                            <h3 class="text-light text-center">Add Posts</h3>
                        </div>
                        <div class="card-body">
                            <form action="add_post.php" method="post" enctype="multipart/form-data">
                                <!-- <blockquote class="blockquote mb-0">
                                <p>A well-known quote, contained in a blockquote element.</p>
                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                                </blockquote> -->
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="pst-itle" class="text-warning">Post Title: </label>
                                        <input type="text" name="pst-Title" placeholder="Enter the Title" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="cat-title" class="text-warning">Post Category: </label>
                                        <!-- <input type="text" name="Title" placeholder="Enter the Title" class="form-control"> -->
                                        <!-- <select name="cat-Title" id="cat">
                                            <option value="0">Choose a Category</option>
                                            <option value="0">Choose a Category</option>
                                            <option value="0">Choose a Category</option>
                                        </select> -->

                                        <div class="input-group">
                                            <!-- <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                            </div> -->
                                            <select name="cat-Title" class="custom-select" id="cat-title">
                                                <option selected>Choose a Category</option>
                                                <?php 
                                                // $rows = ;
                                                foreach(GetAllData("category") as $data){
                                                    echo $data["title"]."<br>";
                                                ?>
                                                <option value="<?php echo $data["title"]; ?>"><?php echo $data["title"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="img-file" class="text-warning">Upload Image: </label>
                                        <!-- <input type="file" name="img-file" placeholder="Upload the image" class="form-control"> -->

                                        <!-- <div class="input-group mb-3"> -->
                                            <!-- <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                            </div> -->
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="img-file" name="file-img"aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="img-file">Choose Image</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="text-warning" for="post-description">Textarea</label>
                                        <textarea rows='10' class="form-control" id="post-description" placeholder="Put your thoughts" name="post-writtings"></textarea>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <a href="dashboard.php" class="btn btn-warning btn-block"> <i class="fa-solid fa-arrow-left"></i> Move to Dashboard</a>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <button type="submit" name="publish" class="btn btn-block btn-success"><i class="fa-solid fa-check"></i> Publish</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <!-- <main>
        <div class="container">
            <p class="text-primary">hello</p>
        </div>
    </main> -->

    <?php /* require "include/db_operation.php";  */?>
    <?php /* var_dump(GetAllData("category")); */?>
<?php require "footer.php"; ?>