<?php
include_once 'dbconnect/connect.php';
class addproductClass extends dbconnect{
    static public function action(){
        if(isset($_GET['id'])){
            self::updateData();
        }else{
            self::insertData();
        }

    }

    static private function insertData(){

        $productName = $_POST['productName'];
        $productDetail = $_POST['productDetail'];
        $productPrict = $_POST['productPrict'];
        $code = rand(10000, 999999);

        $sql = "INSERT INTO product_data(productName, productDetail, productPrice, productCode, productStatus) VALUES (?,?,?,?,?)";

        $data = array($productName, $productDetail, $productPrict, $code, 0);

        self::ExecuteData($sql, $data);
        echo "<script>alert('บันทึกข้อมูลสำเร็จ');</script>";
    }

    static private function updateData(){
        $productName = $_POST['productName'];
        $productDetail = $_POST['productDetail'];
        $productPrict = $_POST['productPrict'];
        $id = $_GET['id'];

        $sql = "UPDATE product_data SET productName=?,productDetail=?,productPrice=? WHERE id=?";

        $data = array($productName, $productDetail, $productPrict, $id);

        self::ExecuteData($sql, $data);
    }

    static public function getData(){
        $sql = "SELECT * FROM product_data WHERE ?";
        $data = array(1);
        return self::getExecute($sql, $data);
    }

    static public function getDataId($id){
        $sql = "SELECT * FROM product_data WHERE id=?";
        $data = array($id);
        return self::getExecute($sql, $data);
    }
}