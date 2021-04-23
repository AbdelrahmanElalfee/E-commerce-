<?php 
include '../shared/config.php';
include './shared/nav.php';
  $name = "";
  $price = "";
  $photo = "";
if(isset($_GET['pro'])){
  $id = $_GET['pro'];
  $select = "SELECT * FROM `products` WHERE id = $id";
  $s_run = mysqli_query($connect, $select);
  $row = mysqli_fetch_assoc($s_run);
  $name = $row['name'];
  $price = $row['price'];
  $photo = $row['photo'];

  
  
}

if(isset($_POST['order'])){
  if(isset($_SESSION['section'])){
  $customerid = $_SESSION['customer'];
  $insert = "INSERT INTO `orders` VALUES (NULL, '$customerid', '$id', '$price')";
  $i_run = mysqli_query($connect, $insert);

  if($i_run){ ?>
    <div class="alert alert-success" role="alert">
    Ordered Successfully
    </div>
<?php
}else{
  ?>
  <div class="alert alert-primary" role="alert">
  Unfortunately Failed
  </div>
  <?php
  }
}
   else{
    header("location: /projects/ecommerce/auth/login.php");
}
 
}
?>

<head>
  <title>Buy Product</title>
</head>
<button onclick="goback()"  class="btn float-left clearfix"><img src="../img/icons8-back-24.png" alt="back">
    <p class="text text-dark">Back</p>
  </button>

  <img class="img mt-5 ml-5 w-40 float-md-left" style="width: 600px; height: 500px" src="/projects/ecommerce/products/upload/<?php echo $photo?>" alt="Product Image">

  <div class="card text-center mt-5 float-md-right mr-5" style="width: 600px; height: 500px;  ">
  <div class="card-body">
    <h2 class="card-title mt-5"><?php echo $name;?></h2>
    <h3 class="card-text mt-5">Price: &nbsp; <?php echo $price;?>EGP</h3>
    <h4 class="card-text mt-5">Shipping time : from 7 - 10 days</h4>
    <h5 class="card-text mt-5">Shipping fees: 50EGP across Cairo </h5>
    <form method="POST">
    <button  class="btn btn-block mt-5" type="submit" name="order" style="background-color: #C77DFF;
      border-color: #C77DFF;">Order Now</button>
    </form>
  </div>
</div>


  






  

<?php 
include '../shared/script.php';
?>