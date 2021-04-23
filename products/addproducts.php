<?php
// navbar
include '../shared/nav.php';
// database connection
include '../shared/config.php';

// sections selection
$selectsection = "SELECT * FROM `sections`";
$ss_run = mysqli_query($connect, $selectsection);

// insertation 
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $section = $_POST['section'];
    $img_name = $_FILES['image']['name'];
    $img_type = $_FILES['image']['type'];
    $img_tmp = $_FILES['image']['tmp_name'];
    $location = "upload/";
    if (move_uploaded_file($img_tmp, $location . $img_name)) {
        $insert = "INSERT INTO `products` VALUES (null ,'$name', '$price', '$img_name', '$quantity', '$section')";
        $i_run = mysqli_query($connect, $insert);

        if ($i_run) {
            header("location: /projects/ecommerce/products/listproducts.php");
            ob_end_flush();
        } else {
            echo "incorrect data, ";
        }
    } else {
        echo "please upload a photo";
    }
}

// variables
$upname = "";
$upprice = "";
$upphoto = "";
$upquantity = "";
$upsectionid = "";
$update = false;

// edit selection (products)
if (isset($_GET['edit'])) {
    $update = true;
    $id = $_GET['edit'];

    $select = "SELECT * FROM `products` WHERE ID = $id";
    $s_run = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($s_run);
    $upname = $row['name'];
    $upprice = $row['price'];
    $upphoto = $row['photo'];
    $upquantity = $row['quantity'];
    $upsectionid = $row['sectionid'];

    // update 
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantity =  $_POST['quantity'];
        $sectionid = $_POST['section'];
        $update = "UPDATE `products` SET name = '$name', price = '$price' , quantity = '$quantity', sectionid = '$sectionid' WHERE ID = $id ";
        $u_run = mysqli_query($connect, $update);
        header("location: /projects/ecommerce/products/listproducts.php");
    }
}
// check if admin
if ($_SESSION['section'] == "admin") {
?>


    <head>
        <title>Add Products</title>
    </head>
    <body style="background-color: #fff1e6;">

    <div class="container col-6 mt-3">
        <!-- heading -->
        <h1 style="text-align: center;" class="">Add Products</h1>

        <!-- form -->
        <form method="POST" enctype="multipart/form-data">
            <!-- name -->
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" placeholder="Insert Name" id="name" name="name" value="<?php echo $upname; ?>">
            </div>
            <!-- price -->
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" placeholder="Insert Price" id="price" name="price" value="<?php echo $upprice; ?>">
            </div>
            <!-- image -->
            <div class="input-group mt-3 mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload Image</span>
                </div>
                <div class="custom-file">
                    <input type="file" name="image" value="<?php echo $upphoto; ?>" class="custom-file-input" id="img" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="img">Choose file</label>
                </div>
            </div>
            <!-- quantity -->
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="text" class="form-control" placeholder="Insert Quantity" id="quantity" name="quantity" value="<?php echo $upquantity; ?>">
                <div class="input-group mb-3 mt-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Section</label>
                    </div>

                    <!-- section -->
                    <select class="custom-select" id="inputGroupSelect01" name="section">
                        <option selected>Choose...</option>
                        <?php
                        // loop to view
                        foreach ($ss_run as $data) {
                        ?>
                            <option value="<?php echo $data['id'] ?>"><?php echo $data['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <!-- buttons -->
            <?php
            if ($update) :
            ?>

                <button class="btn btn-block btn-dark mt-5" name="update">Update Data</button>
                <a href="listproducts.php" class="btn btn-info btn-block mt-2">Back</a>
            <?php
            else :
            ?>
                <button type="submit" class="btn btn-dark btn-block mt-5" name="submit">Send Data</button>
                <a href="listproducts.php" class="btn btn-block mt-2" style="background-color: #ddbea9;" >Show Products</a>
            <?php endif; ?>
        </form>

    </div>




<?php } else { ?>
    <!-- heading -->
    <h1>You are not authorized</h1>

<?php
}
// script
include '../shared/script.php';
?>