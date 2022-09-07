<?php 
    require_once "db.php";
?>

<?php
function InsertAdmin($username, $password, $added_by, $datetime){
    try {
        $conn = MakeConnection();

        $stmt = $conn->prepare("INSERT INTO `admin`(`username`, `password`, `addedby`, `datetime`) VALUES (:uname,:pass,:addedby,:datetime);");
        $stmt->bindParam(':uname', $username);
        $stmt->bindParam(':pass', $password);
        $stmt->bindParam(':addedby', $added_by);
        $stmt->bindParam(':datetime', $datetime);

        return $stmt->execute();
        //echo "New records created successfully";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}

function AdminExsistanceCheck($username){
    try {
        $conn = MakeConnection();
        $flag = false;

        $stmt = $conn->prepare("SELECT * FROM `admin` WHERE `username`=:uname;");
        $stmt->bindParam(':uname', $username);
        $stmt->execute();

        if($stmt->rowcount() > 0){
            $flag = true;
        }

        return $flag;
        

        //echo "New records created successfully";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}

function AdminLogIn($username, $password){
    try {
        $conn = MakeConnection();
        $flag = false;

        $stmt = $conn->prepare("SELECT * FROM `admin` WHERE `username`=:uname AND `password`=:pass;");
        $stmt->bindParam(':uname', $username);
        $stmt->bindParam(':pass', $password);
        $stmt->execute();

        if($stmt->rowcount() > 0){
            $flag = true;
        }

        return $flag;
        

        //echo "New records created successfully";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}


// InsertAdmin("dummy1", "1234", "dummy2");
// echo AdminExsistanceCheck('dummy1');
// echo AdminLogIn("dummy1", "1234");





?>
