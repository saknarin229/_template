<?php

class optionClass{
    static public function chackLogin(){
        if(!isset($_SESSION['name'])){
            echo "<script>alert('login ก่อนใช้งานระบบ!');window.location.href='login.php'</script>";
        } 
    }
}