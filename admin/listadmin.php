<?php 
include '../shared/nav.php';
include '../shared/config.php';
if(isset($_SESSION['adminmaster'])){
$select= "SELECT * FROM `admin`";
$s_run = mysqli_query($connect, $select);

if(isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $delete= "DELETE FROM `admin` WHERE id= $id";
 $d_run = mysqli_query($connect,$delete);
 header("location: listadmin.php");
}
?>

<body style="background-color: #fff1e6;">

<div class="container col-10">
<table class="table table-bordered table-hover mt-5">
  <thead class="thead-dark">
    <tr>
      <th scope="col" style="text-align: center;">ID</th>
      <th scope="col" style="text-align: center;">NAME</th>
      <th scope="col" style="text-align: center;">PHONE</th>
      <th scope="col" style="text-align: center;">MAIL</th>
      <th scope="col" style="text-align: center;">PASSWORD</th>
      <th scope="col" style="text-align: center;">ACTION</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($s_run as $data){ ?>

<tr>
     <td style="text-align: center;"> <?php echo $data ['id']; ?></td>
     <td style="text-align: center;"> <?php echo $data ['name']; ?></td>
     <td style="text-align: center;"> <?php echo $data ['phone']; ?></td>
     <td style="text-align: center;"> <?php echo $data ['mail']; ?></td>
     <td style="text-align: center;"> <?php echo $data ['password']; ?></td>
    
     
     <td> 
     <a href="addadmin.php?edit=<?php echo $data['id'];?>" class="btn btn-dark">Update</a>
     <a onclick="return confirm('Are You Sure')" href="listadmin.php?delete=<?php echo $data ['id'];?>" class="btn btn-danger">Delete</a></td>
</tr>
    <?php } ?>
  
  </tbody>
</table>
</div>

<?php }else{
      header("location: /projects/ecommerce/adminpanel/index.php");
}

include '../shared/script.php';?>