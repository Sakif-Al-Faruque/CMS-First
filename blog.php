<?php 
    require "header.php";
    require "include/common_func.php";
    require "include/db_operation.php";
?>

    <!-- header starts -->
    <header>
        <div class="bg-dark" style="width: 100%">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 py-2">
                        <h1 class="text-light"><i class="fa-solid fa-blog text-primary"></i> Blog</h1>
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
                        foreach(GetAllData("post") as $data){
                            /* echo $data["id"]."<br>";
                            echo $data["post_title"]."<br>";
                            echo $data["category_title"]."<br>";
                            echo "<br>"; */
                    ?>
                    <div class="card mb-3" style="width: 100%">
                        <img src="uploads/post/<?php echo $data["post_img"]; ?>" class="card-img-top" alt="">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6"><h5 class="card-title"><?php echo $data["post_title"]; ?></h5></div>
                                <div class="col-md-3 text-right"><?php echo $data["datetime"]; ?></div>
                                <div class="col-md-3 text-right">Comment(s): <span class="badge badge-secondary">0</span></div>
                            </div>
                            
                            <p class="card-text"><?php echo $data["post_description"]; ?></p>
                            <a href="post_preview.php?id=<?php echo $data["post_description"]; ?>" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                    <?php } ?>

                    <!-- <div class="card mb-3" style="width: 100%">
                        <img src="uploads/post/physics.jpg" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div> -->

                </div>
                <div class="col-md-4 bg-secondary">hello</div>
            </div>
        </div>
    </section>

    
<?php require "footer.php"; ?>