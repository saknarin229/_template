<?php

class optionClass{
    static public function chackLogin(){
        if(!isset($_SESSION['name'])) echo "<script>window.location.href='login.php'</script>";
    }
}