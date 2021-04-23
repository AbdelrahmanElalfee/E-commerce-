<?php
include '../shared/nav.php';
include '../shared/config.php';    
?>

<?php
$read = "SELECT * FROM `sections`";
$r_run = mysqli_query($connect, $read);

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $quantity =  $_POST['quantity'];
    $insert = "INSERT INTO `sections` VALUES (NULL,'$name' , '$quantity')";
    $i_run = mysqli_query($connect, $insert);
    if($name=="" && $quantity==""){
        echo "please insert the data";
    }
    else {
        header("location: /projects/ecommerce/sections/listsection.php");

    }
}

$upname = "";
$upquantity = "";
$update = false;

if (isset($_GET['edit'])) {
    $update = true;
    $id = $_GET['edit'];

    $select = "SELECT * FROM `sections` WHERE ID = $id";
    $s_run = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($s_run);
    $upname = $row['name'];
    $upquantity =  $row['quantity'];

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $quantity =  $_POST['quantity'];
        $update = "UPDATE `sections` SET name = '$name' , quantity = '$quantity' WHERE ID = $id ";
        $u_run = mysqli_query($connect, $update);
        header("location: /projects/ecommerce/sections/listsection.php");
    }
}


?>
<head>
<title>Add Section</title>
</head>
<body style="background-color: #fff1e6;">

<?php
if ($update) :
?>
    <h1 class="mt-5" style="text-align: center;">Update Section</h1>
<?php
else :
?>

    <h1 class="mt-5" style="text-align: center;">Add Section</h1>

<?php endif; ?>

<div class="container col-6 mt-5">
    <form method="POST">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $upname ?>">
        </div>
        <div class="form-group">
            <label for="status">Quantity</label>
            <input type="text" class="form-control" id="status" name="quantity" value="<?php echo $upquantity ?>">
        </div>
        <?php
        if ($update) :
        ?>

            <button class="btn btn-block btn-dark mt-5" name="update">Update Data</button>
            <a href="listsection.php" class="btn btn-info btn-block mt-2">Back</a>
        <?php
        else :
        ?>

            <button type="submit" class="btn btn-dark btn-block mt-5" name="send">Send Data</button>
            <a href="listsection.php" class="btn btn-block mt-2" style="background-color: #ddbea9;" >Show Sections</a>

        <?php endif; ?>
    </form>
</div>

<?php
include '../shared/script.php';
?>