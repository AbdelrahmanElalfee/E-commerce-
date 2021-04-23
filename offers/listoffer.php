<?php
// navbar
include '../shared/nav.php';

// database connection
include '../shared/config.php';

// inner join selection between offers and products
$select = "SELECT
offers.id as id,
offers.name as ofname,
products.name as proname,
offers.precentage as precentage
FROM offers
INNER JOIN products
ON offers.productid = products.id
ORDER BY offers.id";
$s_run = mysqli_query($connect, $select);

// delete
if (isset($_GET['delete'])) {
  $id =  $_GET['delete'];
  $delete = "DELETE FROM `offers` WHERE id = $id";
  $d_run = mysqli_query($connect, $delete);
  header("location: listoffer.php");
}
?>

<head>
  <title>List Offers</title>
</head>
<body style="background-color: #fff1e6;">

<!-- check if admin -->
<?php
if ($_SESSION['section'] == "admin") {
?>
  <!-- back button -->
  <a href="addoffer.php" class="btn float-left clearfix"><img src="../img/icons8-back-24.png" alt="back">
    <p class="text text-dark">ADD</p>
  </a>
<?php } ?>

<!-- container -->
<div class="container col-12 mt-5">

  <!-- heading -->
  <h1 class="mt-3 mb-3 col-11" style="text-align: center;">OFFERS</h1>

  <!-- table to show data -->
  <table class="table table-bordered table-hover">
    <thead class="thead-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">NAME</th>
        <th scope="col">PRODUCT</th>
        <th scope="col">PRECENTAGE</th>

        <?php
        // check if admin
        if ($_SESSION['section'] == "admin") {
        ?>
          <th style="text-align: center;">ACTION</th>
        <?php } ?>

      </tr>
    </thead>
    <tbody>

      <?php
      // loop to view data
      foreach ($s_run as $data) {
      ?>
        <tr>
          <td><?php echo $data['id'] ?></td>
          <td><?php echo $data['ofname'] ?></td>
          <td><?php echo $data['proname'] ?></td>
          <td><?php echo $data['precentage'] ?></td>
          <?php
          // check if admin
          if ($_SESSION['section'] == "admin") {
          ?>
            <td>
              <!-- action buttons -->
              <a class="btn btn-dark" name="edit" href="addoffer.php/?edit=<?php echo $data['id'] ?>">Update</a>
              <a class="btn btn-danger" name="delete" href="listoffer.php?delete=<?php echo $data['id'] ?>">Delete</a>
            </td>
        <?php }
        } ?>
        </tr>
    </tbody>
  </table>
</div>


<?php
// script
include '../shared/script.php';
?>