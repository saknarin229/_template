<?php
include_once 'dbconnect/connect.php';
class addproductClass extends dbconnect{
    static public function action(){

    }

    static private function insertData(){
        $sql = "INSERT INTO product_data(productName, productDetail, productPrice, productCode, productStatus) VALUES (?,?,?,?,?)";
        $data = array();
        self::ExecuteData($sql, $data);
    }

    static private function updateData(){
        $sql = "UPDATE product_data SET productName=?,productDetail=?,productPrice=?,productCode=?,productStatus=? WHERE id=?";
        $data = array();
        self::ExecuteData($sql, $data);
    }

    static public function getData(){

    }
}