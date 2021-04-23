<?php
include '../shared/config.php';
include './shared/nav.php';
include './shared/carao.php';


// $select = "SELECT * FROM `products` where ";

$select = "SELECT
offers.id as id,
products.id as proid,
offers.name as ofname,
offers.precentage as precentage,
products.name as proname,
products.price as price,
products.photo as photo,
products.quantity as proquan
FROM products
INNER JOIN offers
  ON products.id = offers.productid";

$s_run = mysqli_query($connect, $select);




?>
<head>
  <title>Offers</title>
<style>
  h1{
      color:  #3C096C;
    }

    .card .card-deck .row .col .card-groups .card-body{
      background-color: white;
    }

    .card .card-deck .row .col .card-groups .card-body #buy{
      background-color:  #3C096C;
      border-color:  #3C096C;
    }

    .card .card-deck .row .col .card-groups .card-body #feed{
      background-color:  #C77DFF;
      border-color:  #C77DFF;
    }
    
</style>
</head>
    <h1 class="text mt-5 ml-5">Offers</h1>
<div class="card" style="background-color: #e5e5e5; border-color: #e5e5e5;">

  <div class="card-deck ml-5 mt-5">
    <?php foreach ($s_run as $data) {
      $result = $data['price'] - ($data['price'] * ($data['precentage'] / 100));
    ?>
      <div class="row row-cols-1 row-cols-md-3">
        <div class="col mb-4" id="col1">
          <div class="card-groups bg-light card border-dark mb-3" style="padding:auto; width: 400px; height: 750px;" id="card">
            <img src="/projects/ecommerce/products/upload/<?php echo $data['photo']; ?>" class="card-img-top mt-4" alt="product">
            <div class="card-body">
              <h5 class="card-title"><?php echo $data['proname']; ?> </h5>

              <p class="card-text" style="text-decoration-line: line-through ;">Price: <?php echo $data['price']; ?>EGP
              <p><?php echo $result; ?>&nbsp;EGP</p>
              </p>
              <p class="card-text">Status: <?php echo $data['proquan']; ?></p>
              <a href="Buy.php?pro=<?php echo $data['proid'];?>" id="buy" class="btn btn-dark btn-block mt-5">Buy Now</a>
              <a href="feedback.php?feed=<?php echo $data['proid']; ?>" id="feed" class="btn btn-info btn-block">Feedback</a>

            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>




<?php
include '../shared/script.php';
?>