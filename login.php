<?php 
    session_start();
    require "header.php";
    require "include/common_func.php"; 
    require "include/admin_model.php"; 
?>
    <!-- header starts -->
    <header>
        <div class="container my-2">
            <div class="row">
                <div class="col-md-12 bg-dark py-2">
                    <h1 class="text-light"><i class="fa-solid fa-right-to-bracket text-primary"></i> Sign In</h1>
                </div>
            </div>
        </div>
    </header>
    <!-- header ends -->

    <section class="login-panel my-5">
        <div class="container">
            <div class="row">
                <div class="offset-md-3"></div>
                <div class="col-md-6">
                    <?php ShowMessage(); ?>
                    <div class="card">
                        <div class="card-header bg-info text-light">Sign In</div>
                        <div class="card-body">
                            <form action="login_operation.php" method="POST">
                                <label for="basic-url">Username: </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3"><i class="fa-regular fa-user text-info"></i></span>
                                    </div>
                                    <input type="text" name="uname" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                </div>

                                <label for="basic-url">Password: </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3"><i class="fa-solid fa-lock text-info"></i></span>
                                    </div>
                                    <input type="password" name="pass" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                </div>
                                <input type="submit" name="signin" class="btn btn-info btn-block" value="Log In" id="basic-url" aria-describedby="basic-addon3">
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

<?php require "footer.php"; ?>