<?php
include_once 'dbconnect/connect.php';
class addproductClass {
    static public function action(){

    }

    static private function insertData(){
        $sql = "INSERT INTO product_data(productName, productDetail, productPrice, productCode, productStatus) VALUES (?,?,?,?,?)";
    }

    static private function updateData(){
        $sql = "UPDATE product_data SET productName=?,productDetail=?,productPrice=?,productCode=?,productStatus=? WHERE id=?";
    }

    static public function getData(){

    }
}