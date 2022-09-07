<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

    <title>CMS 4.2.1</title>
</head>
<body>
    <!-- nav bar starts -->
    <div class="element-upper bg-primary" style="height: 10px; width: 100%;"></div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/CMS-4.2.1/">CMS 4.2.1</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <?php 
                    if(isset($_SESSION["username"])){
                ?>
                <div class="navbar-nav m-auto">
                    <!-- <a class="nav-link active" href="/CMS-4.2.1/">Home <span class="sr-only">(current)</span></a> -->
                    <a class="nav-link text-success" href="#"><i class="fa-solid fa-user"></i> My Profile</a>
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                    <a class="nav-link" href="post_dashboard.php">Posts</a>
                    <a class="nav-link" href="category.php">Categories</a>
                    <a class="nav-link" href="add_admin.php">Manage Admins</a>
                    <a class="nav-link" href="comment_show.php">Comments</a>
                    <a class="nav-link" href="blog.php">Live Blog</a>
                </div>
                <a href="logout.php" class="nav-link text-right text-danger"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                <?php } ?>
            </div>
        </div>
    </nav>
    <div class="element-lower bg-primary" style="height: 10px; width: 100%;"></div>
    <!-- nav bar ends -->