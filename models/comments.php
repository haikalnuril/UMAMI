<?php

include_once 'app/config/conn.php';

Class Comment{
    static function select(){
        global $conn;
        $sql = "SELECT * FROM comments";
        $result = $conn->query($sql);
        $arr = [];

        if($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                $arr[] = $row;
            }
        }
        return $arr;
    }
    static function insert($recipe_id, $user_id, $comment, $created_at){
        global $conn;
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $sql = "INSERT INTO comments (recipe_id, user_id, comment, created_at) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iiss", $recipe_id, $user_id, $comment, $created_at);
            $stmt->execute();
            $stmt->close();
            return true;
        }
    }
}