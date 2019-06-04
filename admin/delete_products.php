<?php include '../database.php';

$eid=$_REQUEST['eid'];

//mysqli_query($conn,"delete from `products` where `id`='$eid'");

 $sql = ' DELETE FROM products WHERE id = "'.$eid.'"';
   
   mysqli_query($conn, $sql);
     
    header('Location:dashboard.php');
?>