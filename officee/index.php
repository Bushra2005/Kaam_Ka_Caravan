<?php
include("header.php");
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./second.css">
</head>

<body>
    <div class="content-body">
    <div class="col-lg-6 my-5">
                    <?php
                    echo '<h1 class="display-2 text-center text-primary fw-bold">' . $_SESSION['office_name'] . '</h1>';
                    ?>
                </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card bg-primary">
                        <div class="card-icon">
                            <i class="text-white fas fa-briefcase"></i>
                        </div>
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <div class="stat-text">
                                    <h6 class="m-b-0 text-white">Total Vacancies</h6>
                                    <?php
                                    $sql = "SELECT office_name FROM vacancies";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_num_rows($result);
                                    echo "<h1 class='text-white'>$row</h1>";
                                    ?>
                                </div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-success w-85" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card bg-primary">
                        <div class="card-icon">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <div class="stat-text">
                                    <h6 class="m-b-0 text-white">Total Applications</h6>
                                    <?php
                                    $sql = "SELECT office_name FROM job_application";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_num_rows($result);
                                    echo "<h1 class='text-white'>$row</h1>";
                                    ?>
                                </div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-pink w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card bg-primary">
                        <div class="card-icon">
                            <i class="fas fa-calendar-check text-white"></i>
                        </div>
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <div class="stat-text">
                                    <h6 class="m-b-0 text-white">Total Interviews</h6>
                                    <?php
                                    $sql = "SELECT office_name FROM job_application"; // Ensure this query is correct
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_num_rows($result);
                                    echo "<h1 class='text-white'>$row</h1>";
                                    ?>
                                </div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-warning w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card bg-primary">
                        <div class="card-icon">
                            <i class="fas fa-user-shield text-white"></i>
                        </div>
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <div class="stat-text">
                                    <h6 class="m-b-0 text-white">Admin</h6>
                                    <?php
                                    $sql = "SELECT username FROM login";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_num_rows($result);
                                    echo "<h1 class='text-white'>$row</h1>";
                                    ?>
                                </div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger w-65" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>

             
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
include("footer.php");
?>
