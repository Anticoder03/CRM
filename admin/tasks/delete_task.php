<?php
include '../includes/db.php';
$id = $_GET['task_id'];
$sql = "DELETE FROM `tasks` WHERE `task_id` = '$id'";
$res = $conn->query($sql);
if($res){
    header('location:DisplayTask.php');
}

?>