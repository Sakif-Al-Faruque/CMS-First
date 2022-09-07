<?php 
    require_once "db.php";
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

function RetrievePostById($post_id){
    try {
        $conn = MakeConnection();
        $stmt = $conn->prepare("SELECT * FROM `post` WHERE `id`=:post_id;");
        $stmt->bindParam(':post_id', $post_id);
        $stmt->execute();
      
        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch(); //return 1D array
        
      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage(); 
      }
    $conn = null;
}

function EditPost($post_id, $post_title, $cat_title, $author, $post_desc, $post_img, $post_time){
    try {
        $conn = MakeConnection();
        $stmt = $conn->prepare("UPDATE `post` SET `post_title`=:pst_title,`category_title`=:cat_title,`author`=:author,`post_description`=:pst_desc,`post_img`=:pst_img,`datetime`=:pst_time WHERE `id`=:post_id;");
        $stmt->bindParam(':post_id', $post_id);
        $stmt->bindParam(':pst_title', $post_title);
        $stmt->bindParam(':cat_title', $cat_title);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':pst_desc', $post_desc);
        $stmt->bindParam(':pst_img', $post_img);
        $stmt->bindParam(':pst_time', $post_time);

        return $stmt->execute();
        
      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
    $conn = null;
}

function DeletePost($post_id){
    try {
        $conn = MakeConnection();
        $stmt = $conn->prepare("DELETE FROM `post` WHERE `id`=:post_id;");
        $stmt->bindParam(':post_id', $post_id);

        return $stmt->execute();
        
      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
    $conn = null;
}
//
// var_dump(RetrievePostById('1'));

//this function should be noticed
function GetSpecificRowsOfBlog($data){
  $conn = MakeConnection();
  $query = "SELECT * FROM `post` WHERE `post_title` LIKE :data OR `category_title` LIKE :data OR `author` LIKE :data;";
  $stmt = $conn->prepare($query);
  //$stmt->bindParam(':data', '%'.$data.'%');
  $stmt->bindValue(':data', '%'.$data.'%');
  $stmt->execute();

  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetchAll();
  
  return $result;
}

function RetrieveLimitedPost($from, $to){
  try {
      $conn = MakeConnection();
      $stmt = $conn->prepare("SELECT * FROM `post` ORDER BY `id` LIMIT ".$from.", ".$to.";");
      /* $stmt->bindValue(':from', $from);
      $stmt->bindValue(':to', $to); */
      $stmt->execute();
    
      // set the resulting array to associative
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      return $stmt->fetchAll();
      
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage(); 
    }
  $conn = null;
}
// var_dump(RetrieveLimitedPost(1, 4));
// var_dump(RetrievePostById("1"));
?>
