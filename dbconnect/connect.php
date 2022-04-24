<?php

class dbconnect{

    static private function conn(){
        $servername = "localhost";
        $username = "root";
        $password = ""; //123456789
        $db = 'product_data'; //database name

        $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        
        return $conn;
    }

    //รูปแบบการเรียกใช้งาน!
    //sql * form where ?,?
    //array('data','data')
    static public function ExecuteData($sql, $data){ //insert update ข้อมูลใช้ตัวนี้
        $sth = self::conn()->prepare($sql);
        $sth->execute($data);
        return true;
    }

    static public function getExecute($sql, $data){ //ดึงข้อมูล ใช้ตัวนี้
        $sth = self::conn()->prepare($sql);
        $sth->execute($data);
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

}
