<?php
include_once 'dbconnect/connect.php';
class addproductClass extends dbconnect
{
    static public function action()
    {
        if (isset($_GET['id'])) {
            self::updateData();
        } else {
            self::insertData();
        }
    }

    static private function insertData()
    {

        $productName = $_POST['productName'];
        $productDetail = $_POST['productDetail'];
        $productPrict = $_POST['productPrice'];
        $code = rand(10000, 999999);
        self::uploadfile($code);     // เรียกใช้งาน function uploadfile
        $sql = "INSERT INTO product_data(productName, productDetail, productPrice, productCode, productStatus) VALUES (?,?,?,?,?)";

        $data = array($productName, $productDetail, $productPrict, $code, 0);

        self::ExecuteData($sql, $data);
        echo "<script>alert('บันทึกข้อมูลสำเร็จ');window.location.href='productlist.php'</script>";
    }

    static private function updateData()
    {
        $productName = $_POST['productName'];
        $productDetail = $_POST['productDetail'];
        $productPrict = $_POST['productPrice'];
        $id = $_GET['id'];
        $code = $_POST['productCode'];

        $sql = "UPDATE product_data SET productName=?,productDetail=?,productPrice=? WHERE id=?";

        $data = array($productName, $productDetail, $productPrict, $id);
        self::uploadfile($code);     // เรียกใช้งาน function uploadfile
        self::ExecuteData($sql, $data);
        echo "<script>alert('แก้ไขข้อมูลสำเร็จ');</script>";
    }

    static public function deleteData($code){
        $files = scandir("images/$code");
        foreach($files as $file){
            if(file_exists("images/$code/$file")){ // เช็คไฟล์
                unlink("images/$code/$file"); // ลบไฟล์
            }
        }

        if(is_dir("images/$code")){
            rmdir("images/$code"); // ลบ forder
        }

        $sql = "DELETE FROM product_data WHERE productCode = ?";
        $data = array($code);
        self::ExecuteData($sql, $data);
        echo "<script>window.location.href = 'productlist.php'</script>";
    }

    // อัพโหลดไฟล์
    static private function uploadfile($code){
        if ($_FILES['file']['name'][0] !== "") {

            $total = count($_FILES['file']['name']);
            $path = "images/$code";

            for ($i = 0; $i < $total ; $i++) {
                if (!is_dir($path)) mkdir($path); // สร้าง forder
                $typeFile = explode('.', $_FILES['file']['name'][$i]);
                $typeFile = end($typeFile);
                $name = "$path/" . $code .rand(100000,9999999). $i . ".$typeFile";
                move_uploaded_file($_FILES['file']['tmp_name'][$i], $name); // อัพโหลด
            }
        }
    }

    static public function deleteFile($file, $code, $id){
        if(file_exists("images/$code/$file")){
            unlink("images/$code/$file");
        }
        echo "<script>window.location.href = 'addproduct.php?id=$id'</script>";
    }

    static public function getData()
    {
        $sql = "SELECT * FROM product_data WHERE ?";
        $data = array(1);
        return self::getExecute($sql, $data);
    }

    static public function getDataId($id)
    {
        $sql = "SELECT * FROM product_data WHERE id=?";
        $data = array($id);
        return self::getExecute($sql, $data);
    }

    static public function getDataCode($code)
    {
        $sql = "SELECT * FROM product_data WHERE productCode=?";
        $data = array($code);
        return self::getExecute($sql, $data);
    }    
}
