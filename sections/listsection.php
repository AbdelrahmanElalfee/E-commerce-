<?php
include '../shared/nav.php';
include '../shared/config.php';

$select = "SELECT * FROM `sections` ORDER BY id";
$s_run = mysqli_query($connect, $select);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `sections` WHERE ID = $id";
    $d_run = mysqli_query($connect, $delete);
    header("location: /projects/ecommerce/sections/listsection.php");
}
?>
<?php 
if ($_SESSION['section'] == "admin" ) { 
    ?>
<a href="./addsection.php" class="btn float-left clearfix"><img src="../img/icons8-back-24.png" alt="back"><p class="text text-dark">ADD</p></a>
<?php } ?>

<head>
<title>List Sections</title>
</head>
<body style="background-color: #fff1e6;">

<div class="container col-10 mt-3">
<h1 class="mt-3 mb-3 col-11" style="text-align: center;">Sections</h1>
    <table class="table  table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th style="text-align: center;">ID</th>
                <th style="text-align: center;">NAME</th>
                <th style="text-align: center;">STATUS</th>
                <?php 
if ($_SESSION['section'] == "admin" ) { 
    ?>
                <th style="text-align: center;">ACTION</th>
                <?php }?>
                
            </tr>
        </thead>
        <?php
        foreach ($s_run as $data) { ?>
            <tr class="text text-center">
                <td><?php echo $data['id'] ?></td>
                <td><?php echo $data['name'] ?></td>
                <td><?php echo $data['quantity'] ?></td>
                <?php 
if ($_SESSION['section'] == "admin" ) { 
    ?>
                <td style="align-content: center;">
                <a class="btn btn-dark" href="addsection.php?edit=<?php echo $data['id'] ?>">Update</a>

                    <a class="btn btn-danger" href="listsection.php?delete=<?php echo $data['id'] ?>" onclick="Alert()">Delete</a>
                </td>
                <?php } ?>
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
include '../shared/script.php';
?>