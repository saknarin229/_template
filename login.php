<?php
session_start();
include_once 'action/login.class.php';
if (isset($_POST['btn_login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $resData = loginClass::login($username, $password);
    if (count($resData) > 0) {
        $_SESSION['name'] = $resData[0]['name'];
        echo "<script>alert('login สำเร็จ'); 
            window.location.href='dashboard.php'</script>";
    } else {
        echo "<script>alert('username หรือ password ไม่ถูกต้อง!')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

    <!-- ------------ Header -->
    <header class="col-12 bg-info border shadow-sm">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-6 text-start row align-items-center">
                    <h1>
                        <a href="index.php" class="text-light text-decoration-none">LOGO</a>
                    </h1>
                </div>
                <div class="col-6 text-end row align-items-center">
                    <?php if (isset($_SESSION['name'])) : ?>
                        <strong>
                            <a class="text-light" href="dashboard.php"><?php echo $_SESSION['name'] ?></a>
                        </strong>
                        <a onclick="if(!confirm('ฉันต้องการออกจากระบบ!')) return false" class="text-light" href="logout.php">ออกจากระบบ</a>
                    <?php else : ?>
                        <h5><a href="login.php" class="text-light text-decoration-none">LOGIN</a></h5>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
    <!-- ------------ End Header -->

    <!-- --------------- Title -->
    <section class="col-12 text-center p-5">
        <h1>LOGIN</h1>
    </section>
    <!-- --------------- End Title -->


    <!-- ---------------- product -->
    <section class="col-12 mt-5">
        <div class="container">
            <div class="row  p-3 gap-3 justify-content-center">

                <div class="col-6">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control form-control-sm">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control form-control-sm">
                        </div>
                        <div class="text-end">
                            <button type="submit" name="btn_login" class="btn btn-primary">LOGIN</button>
                            <!-- <a href="dashboard.php" class="btn btn-primary">LOGIN</a> -->
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
    <!-- ---------------- end -->


    <footer class="col-12 mt-5 bg-secondary">
        <div class="container">
            <div class="row text-center p-3 text-light">
                <h1>LOGO</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam debitis, corporis accusantium natus provident harum adipisci nobis quidem nihil numquam aliquid sed quae sit similique accusamus? Neque error maiores temporibus!</p>
            </div>
        </div>
    </footer>

</body>

</html>