<?php
include_once 'dbconnect/connect.php';
class loginClass extends dbconnect {
    static public function login($username, $password){
        $sql = "SELECT * FROM admin_data WHERE username = ? AND password = ?";
        $data = array($username, $password);

        $resData = self::getExecute($sql, $data);
        // print_r($resData);
        return $resData;
    }
}