<?php 
session_start();
require "header.php";
?>

    <!-- header starts -->
    <header>
        <div class="container my-2">
            <div class="row">
                <div class="col-md-12 bg-dark py-2">
                    <h1 class="text-light"><i class="fa-solid fa-user text-success"></i> Name</h1>
                </div>
            </div>
        </div>
    </header>
    <!-- header ends -->

    <!-- profile section starts -->
    <section class="profile my-3">
        <div class="container">
            <div class="row">
                <div class="offset-md-3"></div>
                <div class="col-md-6">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="img/avatar.jpg" alt="Profile" class="img-fluid rounded-circle mx-auto d-block">
                            </div>
                            <div class="col-md-8">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga obcaecati voluptate quo veritatis sapiente ex natus, porro delectus eaque! Quisquam nesciunt quae animi suscipit</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- profile section ends -->

    <!-- <main>
        <div class="container">
            <p class="text-primary">hello</p>
        </div>
    </main> -->
<?php require "footer.php"; ?>

