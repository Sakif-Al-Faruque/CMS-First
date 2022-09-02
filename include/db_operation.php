<?php 
    require "db.php";

    function GetAllData($table){
        $conn = MakeConnection();
        $query = "SELECT * FROM ".$table;
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();

        // $conn->closs();

        return $data;
    }

    //var_dump(GetAllData("category"));
    //var_dump(GetAllData("post"));

    /* while($data = GetAllData("category")){
        echo $data["id"];
        echo $data["title"];
        echo $data["author"];
        echo $data["datetime"]."<br>";
    } */

    /* foreach(GetAllData("category") as $data){
        echo $data["id"]."<br>";
        echo $data["title"]."<br>";
        echo $data["author"]."<br>";
        echo $data["datetime"]."<br>";
        echo "<br>";
    } */

    /* foreach(GetAllData("post") as $data){
        echo $data["id"]."<br>";
        echo $data["post_title"]."<br>";
        echo $data["category_title"]."<br>";
        echo "<br>";
    } */

?>