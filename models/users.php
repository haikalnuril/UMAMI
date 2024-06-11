<?php

include_once 'app/config/conn.php';

class User
{
    static function login($data = [])
    {
        global $conn;
    
        $email = $data['email'];
        $password = $data['password'];
    
        $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
        if ($result = $result->fetch_assoc()) {
            $hashedPassword = $result['password'];
            $verify = password_verify($password, $hashedPassword);
            if ($verify) {
                return $result;
            } else {
                return false;
            }
        }
    }
    
    static function register($data = [])
    {
        global $conn;

        $name = $data['username'];
        $password = $data['password'];
        $email = $data['email'];
        $role_id = $data['role_id'];
        $created_at = $data['created_at'];
        $updated_at = $data['updated_at'];

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $sql = "INSERT INTO users (username, password, email, role_id, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssiss", $name, $hashedPassword, $email, $role_id, $created_at, $updated_at);
        $stmt->execute();
        $stmt->close();
        return true;
        }
    }

    public static function findUserByUsernameOrEmail( $username, $email )
    {
          global $conn;
          if ($conn->connect_error) {
              die("Koneksi gagal: " . $conn->connect_error);
          }
  
          $username = $conn->real_escape_string( $username );
          $email = $conn->real_escape_string( $email );
  
          $query = "SELECT username, email FROM users WHERE username = '$username' OR email = '$email' LIMIT 1";
          $result = $conn->query( $query );
  
          if ( $result->num_rows > 0 ) {
              return $result->fetch_assoc();
          } else {
              return null;
          }
      }

    static function getPassword($name)
    {
        global $conn;
        $sql = "SELECT password FROM users WHERE name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $name);
        $stmt->execute();

        $result = $stmt->affected_rows > 0 ? true : false;
        return $result;
    }
    static function select(){
        global $conn;
        $sql = "SELECT * FROM users";

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