<?php 
    session_start();
    require "header.php";
    require "include/common_func.php";
    require "include/db_operation.php";
    require "include/post_model.php";
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
                        if(isset($_GET["search"])){
                            global $rows; 
                            $rows = GetSpecificRowsOfBlog($_GET["search-field"]);
                        }else if(isset($_GET["page"])){

                            $from = 0;
                            if($_GET["page"] < 1){
                                $from = 0;
                            }else{
                                $from = ($_GET["page"]*4) - 4;
                            }
                            
                            global $rows; 
                            $rows = RetrieveLimitedPost($from, 4);
                        }else{
                            global $rows;
                            $rows = GetAllData("post");
                        }
                        foreach($rows as $data){
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
                                
                                if(strlen($data["post_description"]) > 100){
                                    echo substr($data["post_description"], 0, 90)." ... ";
                                }else{
                                    echo $data["post_description"];
                                } 
                            ?></p>
                            <div class="row">
                                <div class="col-md-12 text-right"><a href="post_preview.php?id=<?php echo $data["id"]; ?>" class="btn btn-primary">Read More</a></div>
                            </div>  
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="col-md-4 bg-light">
                    <div class="card">
                        <img src="img/blog.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>

                    <div class="card my-3">
                        <div class="card-header bg-dark text-light">Categories</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-info">An item</li>
                            <li class="list-group-item text-info">A second item</li>
                            <li class="list-group-item text-info">A third item</li>
                        </ul>
                    </div>

                    <div class="card">
                        <div class="card-header bg-info text-light">Subscription</div>
                        <div class="card-body">
                        <form action="login_operation.php" method="POST">
                                <label for="basic-url">Name: </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3"><i class="fa-regular fa-user text-info"></i></span>
                                    </div>
                                    <input type="text" name="subcriber" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                </div>

                                <label for="basic-url">E-mail: </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3"><i class="fa-solid fa-envelope text-info"></i></span>
                                    </div>
                                    <input type="email" name="subcriber-mail" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                </div>
                                <input type="submit" name="subscribe" class="btn btn-info btn-block" value="Subscribe" id="basic-url" aria-describedby="basic-addon3">
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-5">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <!-- <li class="page-item disabled">
                                <a class="page-link">Previous</a>
                            </li> -->

                            <?php 
                                $totalPost = RowCountFromTable('post');
                                $totalPaginationLink = ceil($totalPost / 4);
                                
                                //echo $totalPaginationLink;
                                //$trackPage = 1;
                                ?>
                                <?php 
                                if(isset($_GET["page"])){
                                    $trackPage = $_GET["page"];
                                }
                                ?>

                                <li class="page-item">
                                <a class="page-link" href="blog.php?page=<?php 
                                    
                                    if($trackPage <= 1){
                                        $trackPage = $totalPaginationLink+1;
                                    }
                                    echo --$trackPage;
                                ?>">Previous</a>
                                </li>
                                
                                <?php
                                for($i = 1; $i <= $totalPaginationLink; $i++){
                                    if(isset($_GET["page"])){
                                        if($_GET["page"] == $i){ ?>
                                            <li class="page-item active" aria-current="page"><a class="page-link" href="blog.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

                                    <?php }else{ ?>
                            <li class="page-item"><a class="page-link" href="blog.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

                            <?php }}} ?>
                            
                            <?php 
                                if(isset($_GET["page"])){
                                    $trackPage = $_GET["page"];
                                }
                            ?>
                            <li class="page-item">
                                <a class="page-link" href="blog.php?page=<?php 
                                    if($trackPage >= $totalPaginationLink){
                                        $trackPage = 0;
                                    }
                                    echo ++$trackPage;
                                ?>">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    
<?php require "footer.php"; ?>