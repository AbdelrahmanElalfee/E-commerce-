<?php
// navbar
include '../shared/nav.php';
// database connection
include '../shared/config.php';

// inner join selection between products and sections
$select = "SELECT
products.id as id,
sections.name as sename,
products.name as proname,
products.photo as photo,
products.price as price,
products.quantity as quantity
FROM products
INNER JOIN sections
ON products.sectionid = sections.id 
ORDER BY products.sectionid";
$s_run = mysqli_query($connect, $select);

// delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `products` WHERE ID = $id";
    $d_run = mysqli_query($connect, $delete);
    header("location: /projects/ecommerce/products/listproducts.php");
}
?>

<head>
<title>List Products</title>
</head>
<body style="background-color: #fff1e6;">

<!-- check if admin -->
<?php 
if ($_SESSION['section'] == "admin" ) { 
    ?>
    <!-- back button -->
<a href="addproducts.php" class="btn float-left clearfix"><img src="../img/icons8-back-24.png" alt="back"><p class="text text-dark">ADD</p></a>
<?php } ?>

<!-- container -->
<div class="container col-12 mt-3">
<!-- heading -->
<h1 class="mt-3 mb-3 col-11" style="text-align: center;">Products</h1>

<!-- table to view data -->
    <table class="table  table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th style="text-align: center;">ID</th>
                <th style="text-align: center; width: 50px;">NAME</th>
                <th style="text-align: center;">PRICE</th>
                <th style="text-align: center;">PHOTO</th>
                <th style="text-align: center;">QUANTITY</th>
                <th style="text-align: center;">SECTION</th>
                <?php 
                // check if admin
if ($_SESSION['section'] == "admin" ) { 
    ?>
                <th style="text-align: center;">ACTION</th>
                <?php }?>
            </tr>
        </thead>
        <?php
        // loop to view 
        foreach ($s_run as $data) { ?>
            <tr class="text text-center">
                <td><?php echo $data['id'] ?></td>
                <td style="text-align: center; width: 50px;"><?php echo $data['proname'] ?></td>
                <td><?php echo $data['price'] ?></td>
                <td><img style="width: 50px; height:50px;" class="rounded-circle" id="photo" src="upload/<?php echo $data['photo'] ?>" alt="photo"></td>
                <td><?php echo $data['quantity'] ?></td>
                <td><?php echo $data['sename'] ?></td>
                <?php 
                // check if admin
if ($_SESSION['section'] == "admin" ) { 
    ?>
                <td style="align-content: center;">
                <a class="btn btn-dark" href="addproducts.php?edit=<?php echo $data['id'] ?>">Update</a>

                    <a class="btn btn-danger" href="listproducts.php?delete=<?php echo $data['id'] ?>" onclick="Alert()">Delete</a>
                </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
    <script>
    // alert message
        function Alert() {
            confirm("are you sure ?");
        }
    </script>
</div>




<?php
include '../shared/script.php';
?>