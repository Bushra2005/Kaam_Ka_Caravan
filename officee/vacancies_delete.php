<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php
include("connection.php");
$id = $_GET['id'];
$sql = "delete from vacancies where id = $id";
$result = mysqli_query($conn , $sql);

echo"<script> 
swal('Message Has Been Deleted Successfully', 'error');
window.location.href='add_vacancies.php';
</script>";
?>