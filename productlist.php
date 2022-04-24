<?php
session_start();
include_once 'action/addproduct.class.php';
include_once 'myclassOption/option.class.php';
optionClass::chackLogin();

$resData = addproductClass::getData();

if (isset($_GET['del'])) {
    addproductClass::deleteData($_GET['del']);
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <h1>PRODUCT LIST</h1>
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
                <div class="col-12">
                    <table class="table table-hover border shadow-sm">
                        <thead class="bg-secondary">
                            <tr>
                                <td><strong class="text-light">code</strong></td>
                                <td><strong class="text-light">product name</strong></td>
                                <td><strong class="text-light">prict</strong></td>
                                <td><strong class="text-light">edit</strong></td>
                                <td><strong class="text-light">delete</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resData as $key => $item) : ?>
                                <tr>
                                    <td><?php echo $item['productCode'] ?></td>
                                    <td><?php echo $item['productName'] ?> </td>
                                    <td><?php echo $item['productPrice'] ?> บาท</td>
                                    <td>
                                        <a href="addproduct.php?id=<?php echo $item['id'] ?>">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?del=<?php echo $item['productCode'] ?>" onclick="if(!confirm('are you sure ?')) return false">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
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