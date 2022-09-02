<?php 
    require "db.php";
?>

<?php
function InsertCategory($title, $author, $date){
    try {
        $conn = MakeConnection();

        // prepare sql and bind parameters
        //$sql_query = ;
        /* $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email)
        VALUES (:firstname, :lastname, :email)"); */

        $stmt = $conn->prepare("INSERT INTO `category`(`title`, `author`, `datetime`) VALUES (:title,:author,:date);");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':date', $date);

        return $stmt->execute();
        //echo "New records created successfully";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}

//InsertCategory("Science", "Ken", "4-3-2021");
?>