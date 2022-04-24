<?php

session_start();
include_once 'action/addproduct.class.php';

$resData = addproductClass::getDataCode($_GET['id']);
$files = scandir("images/{$_GET['id']}");
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

        <img src="images/<?php echo $_GET['id'] ?>/<?php echo $files[2] ?>" class="w-25">
        <h1><?php echo $resData[0]['productName'] ?></h1>
        <h3><?php echo number_format($resData[0]['productPrice'], 2) ?> บาท</h3>
    </section>
    <!-- --------------- End Title -->


    <!-- ---------------- product -->
    <section class="col-12 mt-2">
        <div class="container">
            <div class="row  p-3 gap-3 justify-content-center">
                <div class="col-8">
                    <p><?php echo $resData[0]['productDetail'] ?></p>
                </div>

            </div>

            <div class="row justify-content-center">

                <?php foreach ($files as $key => $item) : ?>
                    <?php if ($key > 1) : ?>
                        <div class="col-3">
                            <a href="<?php echo "images/{$_GET['id']}/$item" ?>" target="_black">
                                <img src="<?php echo "images/{$_GET['id']}/$item" ?>" class="w-100 m-3 shadow-sm border" alt="หมวก">
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
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