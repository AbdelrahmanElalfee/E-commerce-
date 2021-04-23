<?php
include '../shared/config.php';
include '../shared/nav.php';

if (isset($_POST['send'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $salary = $_POST['salary'];
    $role = $_POST['role'];
    $insert = "INSERT INTO `employees` VALUES (NULL , '$name' , '$phone' , '$mail' , '$password' , '$salary' , '$role' )";
    $i_run = mysqli_query($connect, $insert);

    header("location: /projects/ecommerce/employees/listemployee.php");
}
//edit part
$name = "";
$mail = "";
$role = "";
$update = false;
if (isset($_GET['edit'])) {
    $update = true;
    $id = $_GET['edit'];
    $select = "SELECT * FROM `employees` WHERE id = $id";
    $s = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($s);
    $name = $row['name'];
    $mail = $row['mail'];
    $role = $row['role'];
    $phone = $row['phone'];
    $password = $row['password'];
    $salary = $row['salary'];
}


if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $salary = $_POST['salary'];
    $role = $_POST['role'];

    $update = "UPDATE `employees` SET name = '$name', phone = '$phone' , mail = '$mail' , password = '$password' , salary = '$salary', role = '$role' WHERE id = '$id' ";
    $u_run = mysqli_query($connect, $update);
    header('location: /projects/ecommerce/employee/listemployee.php');

}

?>
<body style="background-color: #fff1e6;">

<form method="POST">
    <div class="container col-6 mt-3">
        <h1 class="text-dark display-4 " style="text-align: center;"> Add Employee </h1>

        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" value="<?php echo $name; ?>" name="name" class="form-control" >
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Phone</label>
            <input type="number" value="<?php echo $phone ?>" name="phone" class="form-control" >
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Mail</label>
            <input type="float" value="<?php echo $mail ?>" name="mail" class="form-control" >
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" value="<?php echo $password ?>" name="password" class="form-control" >
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Salary</label>
            <input type="number" value="<?php echo $salary ?>" name="salary" class="form-control" >
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Role</label>
            <input type="text" value="<?php echo $role ?>" name="role" class="form-control" >
        </div>
        <?php if ($update) { ?>
            <div class="form-group">
            <button type="submit" name="update" class="btn btn-dark btn-block">Update</button>
            <a href="listproducts.php" class="btn btn-info btn-block mt-2">Back</a>

        </div>
        <?php
        } else {
        ?> <button type="submit" name="send" class="btn btn-dark btn-block">Send Data</button>
            <a href="listemployee.php" class="btn btn-block mt-2" style="background-color: #ddbea9;" >Show Employees</a>

        <?php } ?>
    </div>
</form>







<?php
include '../shared/script.php';
?>