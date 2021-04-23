<?php
include '../shared/config.php';
include '../shared/nav.php';

$select = "SELECT * FROM `employees`";
$s = mysqli_query($connect , $select);

if(isset($_GET['delete'])){

    $id = $_GET['delete'];
    $delete = "DELETE FROM `employees` WHERE id = $id";
   $d = mysqli_query($connect , $delete);
   header("location: /projects/ecommerce/employees/listemployee.php");
}
?>
<body style="background-color: #fff1e6;">



<div class="container col-10 mt-5">
<h1 class="mt-3 mb-3 col-11" style="text-align: center;">Employees</h1>
    <table class="table  table-bordered table-hover">
        <thead class="thead-dark">
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Mail</th>
            <th>Password</th>
            <th>Salary</th>
            <th>Role</th>
            <?php
if ($_SESSION['section'] == "admin") {
?>
            <th>Action</th>
        </thead>
            <?php }
              foreach($s as $data){
            ?>
        <tr>
            <td> <?php echo $data['id']; ?> </td>
            <td> <?php echo $data['name']; ?> </td>
            <td> <?php echo $data['phone']; ?> </td>
            <td> <?php echo $data['mail']; ?> </td>
            <td> <?php echo $data['password']; ?> </td>
            <td> <?php echo $data['salary']; ?> </td>
            <td> <?php echo $data['role']; ?> </td>
            <?php
if ($_SESSION['section'] == "admin") {
?>
            <td> 
            <a href="addemployee.php?edit= <?php echo $data['id'] ?>" class="btn btn-dark">update</a>    
            <a onclick="return confirm('Are You Sure')"href="listemployee.php?delete= <?php echo $data['id'] ?>" class="btn btn-danger">Delete</a>
            </td>
                   
        </tr> 
        <?php } }?>
    </table>
</div>






<?php
include '../shared/script.php';
?>