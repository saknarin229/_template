<?php
session_start();
include_once 'action/addproduct.class.php';
include_once 'myclassOption/option.class.php';
optionClass::chackLogin();

if (isset($_POST['btn_save'])) addproductClass::action();

$productName = null;
$productDetail = null;
$productPrice = null;
$code = null;
if (isset($_GET['id'])) {
    $resData = addproductClass::getDataId($_GET['id']);
    $productName = $resData[0]['productName'];
    $productDetail = $resData[0]['productDetail'];
    $productPrice = $resData[0]['productPrice'];
    $code = $resData[0]['productCode'];
}

if (isset($_GET['df'])) {
    addproductClass::deleteFile($_GET['df'], $_GET['c'], $_GET['id']);
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
    <link rel="stylesheet" href="https://icons.getbootstrap.com/assets/font/bootstrap-icons.css">
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
        <h1>ADD PRODUCT</h1>
    </section>
    <!-- --------------- End Title -->

    <section class="col-12 mt-5">
        <div class="container">
            <div class="row  p-3 gap-3 justify-content-center">
                <div class="col-12 text-center">
                    <a class="btn btn-success btn-sm" href="addproduct.php">add product</a>
                    <a class="btn btn-success btn-sm" href="productlist.php">product list</a>
                </div>
            </div>
        </div>
    </section>
    <!-- ---------------- product -->
    <section class="col-12 mt-5">
        <div class="container">
            <div class="row  p-3 gap-3 justify-content-center">
                <div class="col-6">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="productCode" value="<?php echo $code ?>">
                        <div class="mb-3">
                            <label class="form-label">product name</label>
                            <input type="text" required name="productName" class="form-control form-control-sm" value="<?php echo  $productName ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">product detail</label>
                            <textarea type="text" required name="productDetail" class="form-control form-control-sm"><?php echo  $productDetail ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">product price</label>
                            <input type="text" required name="productPrice" class="form-control form-control-sm" value="<?php echo  $productPrice ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">upload image</label>
                            <input type="file" name="file[]" multiple="multiple" accept="image/*" class="form-control form-control-sm">
                            <?php if ($code !== null) : ?>
                                <?php if (is_dir("images/$code")) : ?>
                                    <?php $files = scandir("images/$code"); ?>
                                    <table class="mt-5 table ">
                                        <?php foreach ($files as $file) : ?>
                                            <?php if ($file !== '.' && $file !== '..') : ?>
                                                <tr>
                                                    <td>
                                                        <a target="_black" href="<?php echo "images/$code/$file" ?>" class="text-decoration-none">
                                                            <i class="bi bi-card-image"></i> <?php echo $file ?>
                                                        </a>
                                                        <a href="?id=<?php echo $_GET['id'] ?>&c=<?php echo $code ?>&df=<?php echo $file ?>" onclick="if(!confirm('ฉันต้องการลบไฟล์นี้!')) return false" class="text-decoration-none float-end"><i class="bi bi-trash-fill"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endif ?>
                                        <?php endforeach; ?>
                                    </table>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <div class="text-end">
                            <button type="submit" name="btn_save" class="btn btn-primary">SAVE PRODUCT</button>
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