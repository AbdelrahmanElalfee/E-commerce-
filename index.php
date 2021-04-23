<?php
include './shared/config.php';
include './customerpanel/shared/nav.php';
include './customerpanel/shared/carasoul.php';
$select = "SELECT * FROM `products` ORDER BY sectionid";
$s_run = mysqli_query($connect, $select);

?>

<head>
  <title>Home</title>
  <!-- css  -->
  <style>
    #card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    h1 {
      color: #3C096C;
    }

    .card .card-deck .row .col .card-groups .card-body {
      background-color: white;
    }

    .card .card-deck .row .col .card-groups .card-body #buy {
      background-color: #3C096C;
      border-color: #3C096C;
    }

    .card .card-deck .row .col .card-groups .card-body #feed {
      background-color: #C77DFF;
      border-color: #C77DFF;
    }
  </style>

</head>

<body>
  <h1 class="text mt-5 ml-5">Products</h1>
  <!-- cards -->
  <div class="card" style="background-color: #e5e5e5; border-color: #e5e5e5; ">
    <div class="card-deck ml-5 mt-5 ">
      <?php foreach ($s_run as $data) { ?>
        <div class="row row-cols-1 row-cols-md-3">
          <div class="col mb-4" id="col1">
            <div class="card-groups bg-light card border-dark mb-3 ml-4" style="padding:auto; width: 400px; height: 750px;" id="card">
              <img src="/projects/ecommerce/products/upload/<?php echo $data['photo']; ?>" class="card-img-top mt-4" style="width: 390px; height:350px;" alt="product">
              <div class="card-body">
                <h5 class="card-title"><?php echo $data['name']; ?> </h5>
                <p class="card-text">Price: <?php echo $data['price']; ?>EGP</p>
                <p class="caed-text">Status: <?php echo $data['quantity']; ?></p>
                <a href="/projects/ecommerce/customerpanel/Buy.php?pro=<?php echo $data['id'];?>" id="buy" class="btn btn-dark btn-block mt-5">Buy Now</a>
                <a href="/projects/ecommerce/customerpanel/feedback.php?feed=<?php echo $data['id']; ?>" id="feed" class="btn btn-info btn-block">Feedback</a>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>


  <?php
  include './customerpanel/shared/footer.php';
  include './shared/script.php';
  ?>