<?php 
include './shared/nav.php';
include '../shared/config.php';


if(isset($_GET['search'])){
    $s_name = $_GET['search'];
  
    $search = "SELECT * FROM `products` WHERE name LIKE '%$s_name%'";
    $se_run = mysqli_query($connect, $search);
    $rows = mysqli_num_rows($se_run);
    
?>

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>
  <!-- back button -->
  <button onclick="goback()"  class="btn float-left clearfix"><img src="../img/icons8-back-24.png" alt="back">
    <p class="text text-dark">Back</p>
  </button>
  <?php
 if($rows > 0){?>
<!-- cards -->
<div class="card" style="background-color: #e5e5e5; border-color: #e5e5e5; ">
    <div class="card-deck ml-2 mt-5">
      <?php foreach ($se_run as $data) { ?>
        <div class="row row-cols-1 row-cols-md-3">
          <div class="col mb-4" id="col1">
            <div class="card-groups bg-light card border-dark mb-3 ml-4" style="padding:auto; width: 400px; height: 750px;" id="card">
              <img src="/projects/ecommerce/products/upload/<?php echo $data['photo']; ?>" class="card-img-top mt-4" style="width: 390px; height:350px;" alt="product">
              <div class="card-body">
                <h5 class="card-title"><?php echo $data['name']; ?> </h5>
                <p class="card-text">Price: <?php echo $data['price']; ?>EGP</p>
                <p class="caed-text">Status: <?php echo $data['quantity']; ?></p>
                <a href="/projects/ecommerce/customerpanel/Buy.php?pro=<?php echo $data['id'];?>" id="buy" class="btn btn-dark btn-block mt-5" style="color: white; background-color: #3C096C">Buy Now</a>
                <a href="/projects/ecommerce/customerpanel/feedback.php?feed=<?php echo $data['id']; ?>" id="feed" class="btn btn-info btn-block" style="background-color: #C77DFF; color:white;">Feedback</a>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>


<?php }}else{
      echo "no result found";
    }
 
 include '../shared/script.php';
 ?>

