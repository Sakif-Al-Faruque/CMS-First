<?php 
    session_start();
    require "header.php";
    require "include/common_func.php";
    require "include/db_operation.php";
    require "include/post_model.php";
    require "include/comment_model.php";
?>

    <!-- header starts -->
    <header>
        <div class="bg-dark" style="width: 100%">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 py-2">
                        <h1 class="text-light"><i class="fa-solid fa-blog text-primary"></i> Blog</h1>
                    </div>
                    <div class="col-md-4 py-2">
                        <form action="blog.php" class="form-inline">
                            <input type="text" class="form-control mr-2" placeholder="Search" name="search-field">
                            <input type="submit" name="search" class="btn btn-primary" value="Go">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header ends -->

    <section class="blog-content">
        <div class="container">
            <div class="row my-3">
                <div class="col-md-8">

                    <?php
                        $data = RetrievePostById($_GET["id"]);
                        ?>
                        <div class="card mb-3" style="width: 100%">
                        <img src="uploads/post/<?php echo $data["post_img"]; ?>" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $data["post_title"]; ?></h5>
                            <div class="row my-3">
                                <div class="col-md-6 text-left">By <b><?php echo $data["author"]; ?></b> | On <b><?php echo $data["datetime"]; ?></b></div>
                                <div class="col-md-6 text-right">Comment(s): <span class="badge badge-secondary">0</span></div>
                            </div>
                            
                            <p class="card-text"><?php 
                                echo $data["post_description"];
                            ?></p>
                            <!-- <div class="row">
                                <div class="col-md-12 text-right"><a href="post_preview.php?id=<?php //echo $data["post_description"]; ?>" class="btn btn-primary">Read More</a></div>
                            </div>  --> 
                        </div>
                    </div>

                    <!-- comment starts -->
                    <?php ShowMessage("danger"); ?>
                    <div class="card mt-5">
                        <h5 class="card-header text-warning">Comments</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="add_comment.php" method="POST">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                                            </div>
                                            <input type="text" name="comment-username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                                            </div>
                                            <input type="email" name="comment-email" class="form-control" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                        <div class="form-group">
                                            <!-- <label for="exampleFormControlTextarea1">Comment</label> -->
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="comment-content">Enter your feedback</textarea>
                                        </div>
                                        <input type="hidden" name="post_id" value="<?php echo $_GET["id"]; ?>">
                                        <button class="btn btn-primary" type="submit" name="comment-press">Post</button>
                                    </form>
                                </div>
                                <!-- <div class="col-md-12">
                                    <h5 class="card-title">Primary card title</h5>
                                    <p class="card-text">Some quick example text to build</p>
                                </div> -->
                            </div>
                            
                        </div>
                    </div>

                    <div class="card mt-5">
                        <div class="card-header">
                            <h5 class="text-warning">Posted Comments</h5>
                        </div>
                        <div class="card-body">
                            <?php foreach(RetrieveCommentById($_GET["id"]) as $cmnt){ ?>
                            <blockquote class="blockquote my-3">
                                <p class="mb-0 mt-3"><?php echo $cmnt["comment_content"]; ?></p>
                                <small><?php echo $cmnt["commentator_email"]; ?> | <?php echo $cmnt["comment_time"]; ?></small>
                                <footer class="blockquote-footer"><?php echo $cmnt["commentator"]; ?></footer>
                            </blockquote>
                            <?php } ?>
                            <!-- <blockquote class="blockquote my-3">
                                <p>A well-known quote, contained in a blockquote element.</p>
                                <footer class="blockquote-footer">Someone famous in</footer>
                            </blockquote>
                            <blockquote class="blockquote my-3">
                                <p>A well-known quote, contained in a blockquote element.</p>
                                <footer class="blockquote-footer">Someone famous in</footer>
                            </blockquote> -->
                        </div>
                    </div>
                    <!-- comment ends -->
                </div>
                <div class="col-md-4 bg-secondary">hello</div>
            </div>
        </div>
    </section>
<?php require "footer.php"; ?>