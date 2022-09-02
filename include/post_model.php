<?php 
    require "db.php";
?>

<?php
function InsertPost($post_title, $cat_title, $author, $post_desc, $post_img, $post_time){
    try {
        $conn = MakeConnection();

        // prepare sql and bind parameters
        //$sql_query = ;
        /* $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email)
        VALUES (:firstname, :lastname, :email)"); */

        $stmt = $conn->prepare("INSERT INTO `post`(`post_title`, `category_title`, `author`, `post_description`, `post_img`, `datetime`) VALUES (:pst_title, :cat_title, :author, :pst_desc, :pst_img, :pst_time);");
        $stmt->bindParam(':pst_title', $post_title);
        $stmt->bindParam(':cat_title', $cat_title);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':pst_desc', $post_desc);
        $stmt->bindParam(':pst_img', $post_img);
        $stmt->bindParam(':pst_time', $post_time);

        return $stmt->execute();
        //echo "New records created successfully";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}

// InsertPost('Atomic reaction', 'Science', 'John', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ducimus possimus, veniam debitis harum amet accusamus laborum veritatis nisi saepe nesciunt exercitationem quae tenetur cupiditate distinctio a ullam enim numquam consequatur?', 'hello.jpg', '3-4-2022 16:6:12');
?>