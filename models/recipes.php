<?php

include_once 'app/config/conn.php';

class Recipe{
    static function select(){
        global $conn;
        $sql = "SELECT * FROM recipes";

        $result = $conn->query($sql);
        $arr = [];

        if($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                $arr[] = $row;
            }
        }
        return $arr;
    }
    static function finds($slug) {
        global $conn;

        // Menyiapkan query dengan placeholder untuk parameter
        $sql = "SELECT * FROM recipes WHERE slug = ?";
        
        // Menyiapkan statement
        $stmt = $conn->prepare($sql);
        
        // Mengikat parameter ke statement
        $stmt->bind_param("s", $slug);

        // Menjalankan statement
        $stmt->execute();

        // Mendapatkan hasil
        $result = $stmt->get_result();
        $arr = [];

        // Memeriksa apakah ada hasil
        if($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                $arr[] = $row;
            }
        }

        // Menutup statement
        $stmt->close();

        return $arr;
    }
}