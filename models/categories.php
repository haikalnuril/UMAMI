<?php
include_once 'app/config/conn.php';

class Category{
    static function select(){
        global $conn;
        $sql = "SELECT * FROM categories";

        $result = $conn->query($sql);
        $arr = [];

        if($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                $arr[] = $row;
            }
        }
        return $arr;
    }
}