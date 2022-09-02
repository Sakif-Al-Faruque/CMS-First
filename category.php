<?php session_start(); ?>
<?php 
    require "header.php";
    require "include/common_func.php";

?>

    <!-- header starts -->
    <header>
        <div class="container my-2">
            <div class="row">
                <div class="col-md-12 bg-dark py-2">
                    <h1 class="text-light"><i class="fa-solid fa-house text-primary"></i> Category</h1>
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
                            <h3 class="text-light text-center">Add Categories</h3>
                        </div>
                        <div class="card-body">
                            <form action="add_categories.php" method="post">
                                <!-- <blockquote class="blockquote mb-0">
                                <p>A well-known quote, contained in a blockquote element.</p>
                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                                </blockquote> -->
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="cat-title" class="text-warning">Category Title: </label>
                                        <input type="text" name="Title" placeholder="Enter the Title" class="form-control">
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

    <?php require "include/db_operation.php"; ?>
    <?php /* var_dump(GetAllData("category")); */?>
<?php require "footer.php"; ?>