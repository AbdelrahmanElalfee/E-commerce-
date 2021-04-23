<?php
include '../shared/config.php';
include '../customerpanel/shared/nav.php';
$error = "";
if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $mail = $_POST['mail'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    //password validation
    if( strlen($password) < 8 ) {
        $error = "Password too short!
        ";
        }
        if( strlen($password) > 10) {
        $error = "Password too long!
        ";
        }
        if( !preg_match("#[0-9]+#", $password ) ) {
        $error = "Password must include at least one number!
        ";
        }
        if( !preg_match("#[a-z]+#", $password ) ) {
        $error = "Password must include at least one letter!
        ";
        }
        if( !preg_match("#[A-Z]+#", $password ) ) {
        $error = "Password must include at least one CAPS!
        ";
        }
        if($error){?>
        <div class="alert alert-danger" role="alert">
        <?php echo "Password validation failure (your choice is weak): $error";?>
        </div>
        <?php } else {
            
            $q1 = "SELECT * FROM `admin` WHERE mail = '$mail'";
            $q2 = "SELECT * FROM `employees`WHERE mail = '$mail'";
            $q3 = "SELECT * FROM `customers`WHERE mail = '$mail'";
        
            $q1_run = mysqli_query($connect, $q1);
            $q2_run = mysqli_query($connect, $q2);
            $q3_run = mysqli_query($connect, $q3);
        
            $row1 = mysqli_num_rows($q1_run);
            $row2 = mysqli_num_rows($q2_run);
            $row3 = mysqli_num_rows($q3_run);

            if($row1 > 0 || $row2 > 0 || $row3 > 0){?>
                <div class="alert alert-danger" role="alert">
    E-mail already taken
    </div>
        <?php }else{
            
        $insert = "INSERT INTO `customers` VALUES (NULL, '$name', '$phone', '$mail', '$password', '$address')";
        $i_run = mysqli_query($connect, $insert);
        header("location: login.php");
        }
}
}
?>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <style>

        .text{
            color: #3C096C;
            text-align: center;
        }

        #signup {
            background-color: #C77DFF;
            border-color: #C77DFF;
        }
    </style>
</head>

<div class=" col-2">
    <a href="login.php" class="btn float-left clearfix"><img src="../img/icons8-back-24.png" alt="back">
        <p class="text text-dark">Back</p>
    </a>
</div>

<div class="container col-6 mt-3">
    <h1 class="text">Welcome ,&nbsp;Please Sign Up</h1>
</div>
<div class="container col-6 mt-4">
    <form method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="name" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Phone</label>
            <input type="tel" name="phone" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">E-mail</label>
            <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Address</label>
            <input type="text" name="address" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            <small id="passwordHelp" class="form-text text-muted">Don't share your password with anyone else.</small>
        </div>
        <button type="submit" name="signup" id="signup" class="btn btn-info btn-block">Sign Up</button>
    </form>
</div>

<?php
include '../shared/script.php';?>