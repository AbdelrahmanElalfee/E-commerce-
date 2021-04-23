<?php
include '../shared/config.php';
include '../customerpanel/shared/nav.php';
// to print array
// echo print_r($_SESSION);



if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $pass = $_POST['password'];
// admin
    $selecta = "SELECT * FROM `admin` WHERE name = '$name' and password = '$pass'";
    $sa_run = mysqli_query($connect, $selecta);
    $rowa = mysqli_num_rows($sa_run);
// employee
    $selecte = "SELECT * FROM `employees` WHERE name = '$name' and password = '$pass'";
    $se_run = mysqli_query($connect, $selecte);
    $rowe = mysqli_num_rows($se_run);
// customer
    $selectc = "SELECT * FROM `customers` WHERE name = '$name' and password = '$pass'";
    $sc_run = mysqli_query($connect, $selectc);
    $rowc = mysqli_num_rows($sc_run);

    if($rowa>0){
        $data = mysqli_fetch_assoc($sa_run);
        $_SESSION['admin'] = $data['id'];
        $_SESSION['section'] = "admin";
        if($data['id'] == 1){
            $_SESSION['adminmaster'] = 1;
        }
        header("location: /projects/ecommerce/adminpanel/index.php");
        ob_end_flush();
    }elseif ($rowc>0) {
        $data = mysqli_fetch_assoc($sc_run);
        $_SESSION['section'] = "customer";
        $_SESSION['customer'] = $data['id'];
        header("location: /projects/ecommerce/index.php");
    } elseif ($rowe>0) {
        $data = mysqli_fetch_assoc($se_run);
        $_SESSION['section'] = "employees";
        $_SESSION['employee'] = $data['id'];
        header("location: /projects/ecommerce/adminpanel/index.php");
    }else{
        ?>
            <div class="alert alert-danger" role="alert">
Incorrect Data</div>
        <?php
    }
}


?>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <style>
        .text {
            color: #3C096C;
            text-align: center;
        }

        #signin {
            background-color: #3C096C;
            border-color: #3C096C;
            color: white;
        }

        #signup {
            background-color: #C77DFF;
            border-color: #C77DFF;
        }
    </style>

</head>

<div class="container col-4 mt-5">
    <h1 class="text">Welcome ,&nbsp;Please Sign In</h1>
</div>
<div class="container col-6 mt-5">
    <form method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" name="name" placeholder="Username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            <small id="passwordHelp" class="form-text text-muted">Don't share your password with anyone else.</small>
        </div>
        
            <button type="submit" id="signin" name="login" class="btn  btn-block mt-3">Sign In</button>

        
        <a class="btn btn-block" id="signup" href="register.php">Sign Up</a>
    </form>
</div>


<?php
include '../shared/script.php';
?>