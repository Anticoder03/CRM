<?php
include '../includes/db.php';
$id = $_GET['id'];
$sql = "DELETE FROM `sales` WHERE `sale_id` = '$id'";
$res = $conn->query($sql);
if($res){
    header("location:admin_panal.php");

}
else{
    echo "<script>alert('Fail to delete due to server or database issue')</script>";
    header("location:admin_panal.php");

}


?>