<?php
// navbar
include '../shared/nav.php';

// database connection
include '../shared/config.php';

// products selection
$selectproducts = "SELECT * FROM `products`";
$sp_run = mysqli_query($connect, $selectproducts);

// insertation
if (isset($_POST['addoffer'])) {
  $name = $_POST['name'];
  $productid = $_POST['product'];
  $precentage = $_POST['precentage'];
  $insert = "INSERT INTO `offers` VALUES (NULL , '$name', '$precentage', '$productid' )";
  $i_run = mysqli_query($connect, $insert);
   header("location: listoffer.php");
}

// variables
$upname = "";
$product = "";
$section = "";
$update = false;

// edit selection (offers)
if (isset($_GET['edit'])) {
  $id =  $_GET['edit'];
  $edit = "SELECT * FROM `offers` WHERE id = $id";
  $e_run = mysqli_query($connect, $edit);
  $row = mysqli_fetch_assoc($e_run);
  $upname = $row['name'];
  $product = $row['productid'];
  $section = $row['precentage'];
  $update = true;
}

// update
if (isset($_POST['update'])) {
  $name = $_POST['name'];
  $productid = $_POST['product'];
  $sectionid = $_POST['precentage'];

  $overwrite = "UPDATE `offers` SET name = '$name',precentage = '$sectionid', productid = '$productid'  WHERE ID = $id ";
  $o_run = mysqli_query($connect, $overwrite);

  header("location: /projects/ecommerce/offers/listoffer.php");
}

// checking if is update
if ($update) {
  
  // check if admin
  if ($_SESSION['section'] == "admin") {
?>
    <!-- back button -->
    <button onclick="goback()" class="btn float-left clearfix"><img src="/projects/ecommerce/img/icons8-back-24.png" alt="back">
      <p class="text text-dark">Back</p>
    </button>

<?php }
} ?>

<head>
  <title>Add Offer</title>
</head>
<body style="background-color: #fff1e6;">

<!-- container -->
<div class="container col-6 mt-5">

  <!-- heading -->
  <h1 style="text-align: center;" class="">Add Offers</h1>

  <!-- insertation & update form -->
  <form method="POST">

    <!-- name -->
    <div class="form-group">
      <label for="exampleInputEmail1">Name</label>
      <input type="text" name="name" value="<?php echo $upname ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <!-- precentage -->
    <div class="form-group">
      <label for="exampleInputEmail1">precentage</label>
      <input type="text" name="precentage" value="<?php echo $section ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <!-- products -->
    <div class="input-group-prepend">
      <label class="input-group-text" for="inputGroupSelect01">Products</label>
      <select class="custom-select" id="inputGroupSelect01" name="product">
        <option selected>Choose...</option>

        <!-- loop to view products -->
        <?php foreach ($sp_run as $data) { ?>
          <option value="<?php echo $data['id'] ?>"><?php echo $data['name']; ?></option>
        <?php } ?>
      </select>
    </div>

    <!-- check if is update -->
    <?php if ($update) {
    ?>

      <!-- update button -->
      <button class="btn btn-dark btn-block mt-5" name="update">update data </button>
      <a href="listoffer.php" class="btn btn-info btn-block mt-2">Show Offers</a>

    <?php  } else { ?>

      <!-- insertation buttons -->
      <button type="submit" name="addoffer" class="btn btn-dark btn-block mt-5">Add Offer</button>
      <a href="listoffer.php" class="btn btn-block mt-2" style="background-color: #ddbea9;">Show Offers</a>

    <?php } ?>
  </form>
</div>

<?php
// script
include '../shared/script.php';
?>