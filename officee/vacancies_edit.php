<?php
include("connection.php");
include("header.php");

$ID = $_GET["id"];
$sql = "SELECT * FROM vacancies WHERE id = $ID";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Vacancy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            color: #333;
            font-family: Arial, sans-serif;
        }
        .container-fluid {
            padding: 30px;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            padding: 30px;
        }
        .form-control {
            border-radius: 0.375rem;
            border: 1px solid #ced4da;
            box-shadow: none;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
        }
        .btn {
            border-radius: 0.375rem;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: 500;
            transition: background-color 0.3s, color 0.3s;
        }
        #btn {
            background-color: white;
            color: black;
        }
        #btn:hover {
            background-color: #f8f9fa;
            color: #333;
        }
        #btn2 {
            background-color: black;
            color: white;
        }
        #btn2:hover {
            background-color: #343a40;
        }
        .form-grp {
            margin-bottom: 20px;
        }
        .form-grp label {
            font-weight: 600;
            color: #333;
        }
        .text-white {
            color: #333;
        }
        .form-control-file {
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
            padding: 10px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="content-body">
                    <div class="container-fluid mt-5 col-lg-12">
                        <div class="card">
                        <h1 class="text-primary text-center mt-3">Update Vacancies </h1>

                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="form-grp">
                                            <label for="office_name" class="text-dark">Office Name:</label>
                                            <input type="text" id="office_name" value="<?php echo htmlspecialchars($rows['office_name']); ?>" name="office_name" class="form-control" placeholder="Enter New Office Name">
                                        </div>
                                        <div class="form-grp mt-3">
                                            <label for="job_title" class="text-dark">Job Title:</label>
                                            <input type="text" id="job_title" value="<?php echo htmlspecialchars($rows['job_title']); ?>" name="job_title" class="form-control" placeholder="Enter Your Job Title">
                                        </div>
                                        <div class="form-grp mt-3">
                                            <label for="experience" class="text-dark">Experience:</label>
                                            <input type="text" id="experience" value="<?php echo htmlspecialchars($rows['experience']); ?>" name="experience" class="form-control" placeholder="Enter Experience">
                                        </div>
                                        <div class="form-grp mt-3">
                                            <label for="about" class="text-dark">About:</label>
                                            <textarea name="about" id="about" class="form-control" cols="10" rows="5" placeholder="Your About"><?php echo htmlspecialchars($rows['about']); ?></textarea>
                                        </div>
                                        <div class="form-grp mt-3">
                                            <label for="image" class="text-dark">Images:</label>
                                            <input type="file" name="image" id="image" class="form-control-file">
                                        </div>
                                        <button type="submit" name="update" class="btn btn-primary mt-3 fw-bold">Update!</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
if(isset($_POST['update'])){
    $office_name = $_POST['office_name'];
    $job_title = $_POST['job_title'];
    $experience = $_POST['experience'];
    $about = $_POST['about'];
    $image = $_FILES['image']['name'];
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($file_tmp, "images/" .$file_name);
    }
    $id = $_GET['id'];
    $sql = "UPDATE vacancies SET office_name = '$office_name', job_title = '$job_title', experience = '$experience', about = '$about', image = '$image' WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    echo "<script>
    swal('Vacancy Has Been Updated!', 'success')
    .then(() => window.location.href='add_vacancies.php');
    </script>";
}
include("footer.php");
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
