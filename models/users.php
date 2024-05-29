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

        $name = $data['name'];
        $password = $data['password'];
        $email = $data['email'];

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users SET name = ?, password = ?, email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sss', $name, $hashedPassword, $email);
        $stmt->execute();

        $result = $stmt->affected_rows > 0 ? true : false;
        return $result;
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
}