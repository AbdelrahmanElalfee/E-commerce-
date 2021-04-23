<?php
include '../shared/nav.php';
include '../shared/config.php';

// orders select
$select = "SELECT
orders.id as id,
customers.name as cuname,
products.name as prname,
products.photo as photo,
orders.price as price
FROM orders
INNER JOIN customers
  ON orders.customerid = customers.id
INNER JOIN products
  ON orders.productid = products.id";
  
$so_run = mysqli_query($connect, $select);

if (isset($_GET['deleteorder'])) {
    $id = $_GET['deleteorder'];
    $delete = "DELETE FROM `orders` WHERE ID = $id";
    $d_run = mysqli_query($connect, $delete);
    header("location: index.php");
}


// feedback select

// $select = "SELECT * FROM `feedback`";
$select = "SELECT
feedback.id as id,
customers.name as cuname,
products.name as prname,
products.photo as photo,
feedback.decription as decription
FROM feedback
INNER JOIN customers
  ON feedback.customerid = customers.id
INNER JOIN products
  ON feedback.productid = products.id"; 

$sf_run = mysqli_query($connect, $select);
if(isset($_GET['deletefeedback'])){
  $id =  $_GET['deletefeedback'];
  $delete = "DELETE FROM `feedback` WHERE id = $id";
  $d_run = mysqli_query($connect, $delete);
  header("location: index.php");
}

if ($_SESSION['section'] == "admin" || $_SESSION['section'] == "employees" ) { 
    
?>


<head>
<title>Home</title>
</head>
<body style="background-color: #fff1e6;">
  

<!-- orders table -->
<div class="container col-10 mt-3">
<h1 class="mt-3 col-11" style="text-align: center;">Orders</h1>

    <table class="table  table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th style="text-align: center;">ID</th>
                <th style="text-align: center;">CUSTOMER</th>
                <th style="text-align: center;">PRODUCT</th>
                <th style="text-align: center;">PHOTO</th>
                <th style="text-align: center;">PRICE</th>
                <?php 
if ($_SESSION['section'] == "admin" ) { 
    ?>
                <th style="text-align: center;">ACTIONS</th>

                <?php }?>
            </tr>
        </thead>
        <?php
        foreach ($so_run as $datao) { ?>
            <tr class="text text-center">
                <td><?php echo $datao['id'] ?></td>
                <td><?php echo $datao['cuname'] ?></td>
                <td><?php echo $datao['prname'] ?></td>
                <td><img style="width: 50px; height:50px;" class="rounded-circle" src="../products/upload/<?php echo $datao['photo'];?>" alt="product img"></td>
                <td><?php echo $datao['price']?></td>
                <?php 
if ($_SESSION['section'] == "admin" ) { 
    ?>
                <td style="align-content: center;">
                    <a class="btn btn-danger" href="index.php?deleteorder=<?php echo $datao['id'] ?>" onclick="Alert()">Delete</a>
                </td>
                <?php }?>
            </tr>
        <?php } ?>

    </table>
    
    <script>
        function Alert() {
            alert("are you sure ?");
        }
    </script>
</div>
<?php
                        if ($_SESSION['section'] == "admin") {
                        ?>
<!-- feedback table -->
<div class="container col-10 mt-5">
<h1 class="mt-3 col-11" style="text-align: center;">Feedback</h1>

<table class="table table-bordered table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col" style="text-align: center;">ID</th>
      <th scope="col" style="text-align: center;">CUSTOMER</th>
      <th scope="col" style="text-align: center;">PRODUCT</th>
      <th scope="col" style="text-align: center;">PHOTO</th>
      <th scope="col" style="text-align: center;">DESCRIPTION</th>
      <th scope="col" style="text-align: center;">ACTIONS</th>
    </tr>
  </thead>
  <tbody>
  <?php
        foreach($sf_run as $dataf){
        ?>
    <tr>
            <td style="text-align: center;"><?php echo $dataf['id']?></td>
            <td style="text-align: center;"><?php echo $dataf['cuname']?></td>
            <td style="text-align: center;"><?php echo $dataf['prname']?></td>
            <td style="text-align: center;"><img style="width: 50px; height:50px;" class="rounded-circle" src="../products/upload/<?php echo $dataf['photo']?>" alt="Product Img"></td>
            <td style="text-align: center;"><?php echo $dataf['decription']?></td>
            <td style="align-content: center;">
            <a class="btn btn-danger" href="index.php?deletefeedback=<?php echo $dataf['id']?>">Delete</a>
            </td>
            <?php  }?>
    </tr>
  </tbody>
</table>
</div>
<?php }?>

</body>


<?php 
}
include '../shared/script.php';
?>