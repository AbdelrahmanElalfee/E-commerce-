<?php
session_start();
ob_start();

if (isset($_POST['signout'])) {
    session_unset();
    session_destroy();
    header("location: /projects/ecommerce/index.php");
}


?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" style="color: #FFB480;" href="/projects/ecommerce/adminpanel/index.php">
            <img src="/projects/ecommerce/img/icons8-savouring-delicious-food-face-64.png" width="30" height="30" class="d-inline-block align-top" alt="">
            &nbsp;Happiness
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle text text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sections
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
<?php
                        if ($_SESSION['section'] == "admin") {
?>
                            <a class="dropdown-item" href="/projects/ecommerce/sections/addsection.php">Add section</a>
 <?php }
                        if ($_SESSION['section'] == "admin" || $_SESSION['section'] == "employees") {
?>
                            <a class="dropdown-item" href="/projects/ecommerce/sections/listsection.php">List Sections</a>
                    </div>
<?php  } ?>
                </li>

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle text text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Products
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
<?php
                        if ($_SESSION['section'] == "admin") {
?>
                            <a class="dropdown-item" href="/projects/ecommerce/products/addproducts.php">Add Products</a>
<?php }
                        if ($_SESSION['section'] == "admin" || $_SESSION['section'] == "employees") {
?>
                            <a class="dropdown-item" href="/projects/ecommerce/products/listproducts.php">List Products</a>
                    </div>
                </li>
<?php } ?>


            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle text text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Offers
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php
                    if ($_SESSION['section'] == "admin") {
                    ?>
                        <a class="dropdown-item" href="/projects/ecommerce/offers/addoffer.php">Add Offers</a>
                    <?php }
                    if ($_SESSION['section'] == "admin" || $_SESSION['section'] == "employees") {
                    ?>
                        <a class="dropdown-item" href="/projects/ecommerce/offers/listoffer.php">List Offers</a>
                </div>
            </li>
<?php } ?>

        <li class="nav-item dropdown">

            <a class="nav-link dropdown-toggle text text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Employees
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
<?php
                if ($_SESSION['section'] == "admin") {
?>
                    <a class="dropdown-item" href="/projects/ecommerce/employees/addemployee.php">Add Employees</a>
<?php }
                if ($_SESSION['section'] == "admin" || $_SESSION['section'] == "employees") {
?>
                    <a class="dropdown-item" href="/projects/ecommerce/employees/listemployee.php">List Employees</a>
            </div>
        </li>
<?php } ?>

    <li class="nav-item dropdown">

        <a class="nav-link dropdown-toggle text text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Customers
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

<?php
            if ($_SESSION['section'] == "admin" || $_SESSION['section'] == "employees") {
?>
                <a class="dropdown-item" href="/projects/ecommerce/customers/listcustomer.php">List Customers</a>
        </div>
    </li>
<?php } 

if(isset($_SESSION['adminmaster'])){
?>
<li class="nav-item dropdown">

        <a class="nav-link dropdown-toggle text text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Admin
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/projects/ecommerce/admin/addadmin.php">Add Admin</a>
                <a class="dropdown-item" href="/projects/ecommerce/admin/listadmin.php">List Admins</a>

    <?php }?>
            </ul>
            <form method="POST" class="form-inline my-2 my-lg-0">
                <button class="btn btn-danger my-2 my-sm-0" name="signout" type="submit">Sign Out</button>
            </form>
        </div>
    </nav>