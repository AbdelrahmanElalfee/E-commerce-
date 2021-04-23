<?php
include '../shared/config.php';
include '../shared/nav.php';

$select = "SELECT * FROM `customers`";
$s = mysqli_query($connect , $select);

if(isset($_GET['delete'])){

    $id = $_GET['delete'];
    $delete = "DELETE FROM `customers` WHERE id = $id";
    $d_run = mysqli_query($connect, $delete);
    header("location: listcustomer.php");

}

?>
<body style="background-color: #fff1e6;">

<div class="container col-10 mt-5">
    <table class="table  table-bordered table-hover">
        <thead class="thead-dark">
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Mail</th>
            <th>Password</th>
            <th>Address</th>
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
            <td> <?php echo $data['address']; ?> </td>
            <?php
if ($_SESSION['section'] == "admin") {
?>
            <td> <a onclick="alert()"href="listcustomer.php?delete= <?php echo $data['id'] ?>" class="btn btn-danger">Delete</a>    
        </tr> 
        <?php } }?>
    </table>
</div>

<?php
include '../shared/script.php';
?>