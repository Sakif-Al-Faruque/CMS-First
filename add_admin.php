<?php session_start(); ?>
<?php 
    require "header.php";
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
                    <h1 class="text-light"><i class="fa-solid fa-user text-primary"></i> Manage Admin</h1> 
                </div>
            </div>
        </div>
    </header>
    <!-- header ends -->

    <section class="category-submission my-3">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <?php ShowMessage(); ?>
                    <div class="card bg-dark">
                        <div class="card-header">
                            <h3 class="text-light text-center">Add Admin</h3>
                        </div>
                        <div class="card-body">
                            <form action="admin_operation.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="for-username" class="text-warning">Username: </label>
                                        <input type="text" name="uname" placeholder="Enter the Username" class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="for-pass" class="text-warning">Password: </label>
                                        <input type="password" name="pass" placeholder="Enter the password" class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="for-re-pass" class="text-warning">Repeat-password: </label>
                                        <input type="password" name="re-pass" placeholder="Re-enter the password" class="form-control">
                                    </div>
                                    
                                    <div class="col-md-6 mt-3">
                                        <a href="dashboard.php" class="btn btn-warning btn-block"> <i class="fa-solid fa-arrow-left"></i> Move to Dashboard</a>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <button type="submit" name="signup" class="btn btn-block btn-success"><i class="fa-solid fa-check"></i> Sign Up</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<?php require "footer.php"; ?>