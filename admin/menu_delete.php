<?php
include("connection.php");
$id = $_GET['id'];
$sql = "delete from menu where id = $id";
$result = mysqli_query($conn , $sql);

echo"<script> 
alert('Menu   Has Been Deleted Successfully');
window.location.href='menu.php';
</script>";
?>