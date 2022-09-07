<?php 
    require_once "db.php";
?>

<?php 
    function InsertComment($commentator, $comment_email, $comment_content, $comment_time, $comment_status, $post_id){
        try {
            $conn = MakeConnection();
    
            // prepare sql and bind parameters
            //$sql_query = ;
            /* $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email)
            VALUES (:firstname, :lastname, :email)"); */
    
            $stmt = $conn->prepare("INSERT INTO `comment`(`commentator`, `commentator_email`, `comment_content`, `comment_time`, `status`, `post_id`) VALUES (:cmnt_name,:cmnt_email,:cmnt_content,:cmnt_time,:cmnt_status,:pst_id);");
            $stmt->bindParam(':cmnt_name', $commentator);
            $stmt->bindParam(':cmnt_email', $comment_email);
            $stmt->bindParam(':cmnt_content', $comment_content);
            $stmt->bindParam(':cmnt_time', $comment_time);
            $stmt->bindParam(':cmnt_status', $comment_status);
            $stmt->bindParam(':pst_id', $post_id);
    
            return $stmt->execute();
            //echo "New records created successfully";
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }

    //InsertComment("Ken", "k@gmail.com", "hello world", "5-9-2022 9:18:32", "OFF", "1");

    function RetrieveCommentById($post_id){
        try {
            $conn = MakeConnection();
            $stmt = $conn->prepare("SELECT * FROM `comment` WHERE `post_id`=:pst_id;");
            $stmt->bindParam(':pst_id', $post_id);
            $stmt->execute();
          
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
            
          } catch(PDOException $e) {
            echo "Error: " . $e->getMessage(); 
          }
        $conn = null;
    }

    function RetrieveCommentByApprovalStatus($status){
        try {
            $conn = MakeConnection();
            $stmt = $conn->prepare("SELECT * FROM `comment` WHERE `status` = :status;");
            $stmt->bindParam(':status', $status);
            $stmt->execute();
          
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
            
          } catch(PDOException $e) {
            echo "Error: " . $e->getMessage(); 
          }
        $conn = null;
    }
    
    function ChangeApproval($cmnt_id, $status, $approvedBy){
      try {
          $conn = MakeConnection();
  
          // prepare sql and bind parameters
          //$sql_query = ;
          /* $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email)
          VALUES (:firstname, :lastname, :email)"); */
  
          $stmt = $conn->prepare("UPDATE `comment` SET `status`=:status, `approved_by`=:approvedby WHERE `cmnt_id`= :id;");
          $stmt->bindParam(':status', $status);
          $stmt->bindParam(':approvedby', $approvedBy);
          $stmt->bindParam(':id', $cmnt_id);
          
          return $stmt->execute();
          //echo "New records created successfully";
      } catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
      }
      $conn = null;
    }

    function DeleteComment($cmnt_id){
      try {
          $conn = MakeConnection();
  
          // prepare sql and bind parameters
          //$sql_query = ;
          /* $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email)
          VALUES (:firstname, :lastname, :email)"); */
  
          $stmt = $conn->prepare("DELETE FROM `comment` WHERE `cmnt_id`= :id;");
          $stmt->bindParam(':id', $cmnt_id);
          
          return $stmt->execute();
          //echo "New records created successfully";
      } catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
      }
      $conn = null;
    }
    //ChangeApproval('2', 'ON', $approvedBy);
    //var_dump(RetrieveCommentById("1"));
    //var_dump(RetrieveCommentByApprovalStatus('OFF'));
?>