<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?php
include("connection.php");

$id = $_GET['id'];
$sql = "DELETE FROM virtual_office WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            swal({
                title: 'Deleted!',
                text: 'Virtual Office Has Been Deleted Successfully.',
                icon: 'success',
            }).then(function() {
                window.location.href = 'virtual_office.php';
            });
        });
    </script>";
} else {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            swal({
                title: 'Error!',
                text: 'Failed to delete the Virtual Office. Please try again.',
                icon: 'error',
            }).then(function() {
                window.location.href = 'virtual_office.php';
            });
        });
    </script>";
}
?>
