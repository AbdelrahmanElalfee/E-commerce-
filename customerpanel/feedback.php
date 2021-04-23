<?php
include '../shared/config.php';
include './shared/nav.php';
$proname = "";
if(isset($_GET['feed'])){
    $id = $_GET['feed'];

    $select = "SELECT * FROM `products` WHERE id = $id";
    $s_run = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($s_run);
    $proname = $row['name'];

}

if(isset($_POST['send'])){

    if(isset($_SESSION['section'])){
      $userid = $_SESSION['customer'];

    $feed = $_POST['feed'];
    $insert = "INSERT INTO `feedback` VALUES (NULL , '$userid', '$feed', '$id' ) ";
    $i_run = mysqli_query($connect, $insert);

    header("location: /projects/ecommerce/index.php");
    }else{
      header("location: /projects/ecommerce/auth/login.php");
    }
}



?>

<head>
    <title>Feedback</title>
</head>

<button onclick="goback()" class="btn float-left clearfix"><img src="../img/icons8-back-24.png" alt="back">
    <p class="text text-dark">Back</p>
</button>



<div class="container col-7 mt-5">
    <h1 style="text-align: center; color:#3C096C;">Feedback Form</h1>
<form method="Post">
<!-- <div class="input-group mb-3 mt-5">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1" style="background-color: #7B2CBF; color:white;">Username</span>
  </div>
  <input type="text" class="form-control" placeholder="Username" name="user" aria-label="Username" aria-describedby="basic-addon1">
</div> -->

<div class="input-group mb-3 mt-5">
  <div class="input-group-prepend">
    <span class="input-group-text" style="background-color: #7B2CBF; color:white;" id="basic-addon3">Product</span>
  </div>
  <input type="text" placeholder="<?php echo $proname ?>" name="product" class="form-control" id="basic-url" aria-describedby="basic-addon3" disabled>
</div>

<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text" style="background-color: #7B2CBF; color:white;">Feedback</span>
  </div>
  <textarea name="feed" placeholder="Feedback Description" class="form-control" aria-label="With textarea"></textarea>
</div>
<button class="btn btn-block mt-5" style="background-color: #7B2CBF; color:white;" name="send">Send Feedback</button>

</div>

</form>




<?php 
include '../shared/script.php';
?>