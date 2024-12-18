<?php
include("header.php");
include("connection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

session_start();
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaam Ka کاروان</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./logo_abbr.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: white;
            color: black;
        }
        .container {
            margin-top: 10px; /* Changed to 10px */
        }
        .modal-dialog.custom-modal {
            max-width: 900px; /* Adjust width as needed */
        }
        .card {
            background-color: rgba(255, 255, 255, 0.1);
            border: none;
            color: white;
            margin-bottom: 20px;
        }
        .table {
            color: white;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .fa-trash, .fa-pen-to-square {
            color: white;
        }
        .fa-trash:hover, .fa-pen-to-square:hover {
            color: #ccc;
        }
        .animate__animated {
            animation-duration: 1.5s;
        }
        .container {
            margin-top: 100px;
        }
    </style>
</head>
<body>
<div class="content-body">
    <div class="container">
        <h3 class="my-5 mt-5 text-primary text-center fw-bold animate__animated animate__fadeInDown" style="margin-top: 20px;">
            Job Vacancies By <?php echo $_SESSION['office_name']; ?> On Kaam Ka کاروان
        </h3>
        <div class="col-lg-12">
            <div class="row">
                <button class="btn w-50 mx-auto animate__animated animate__fadeInUp bg-primary text-white" id="btn" data-bs-toggle="modal" data-bs-target="#example"><i class="fa-solid fa-plus"></i> Add Vacancies </button>
            </div>
        </div>
        <div class="row col-lg-12 mt-5">
            <div class="card animate__animated animate__fadeIn">
                <div class="card-body">
                    <table class="table table-responsive-sm mx-auto text-center ">
                        <thead>
                            <tr class="text-primary">
                                <th>Id</th>
                                <th>Office</th>
                                <th>Job Title</th>
                                <th>Experience</th>
                                <th>About</th>
                                <th>Images</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody class="text-dark">
                            <?php
                            $office_name = $_SESSION['office_name'];
                            $sql = "SELECT * FROM vacancies WHERE office_name = '$office_name'";
                            $result = mysqli_query($conn, $sql);
                            while ($rows = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo htmlspecialchars($rows['id']); ?></td>
                                <td><?php echo htmlspecialchars($rows['office_name']); ?></td>
                                <td><?php echo htmlspecialchars($rows['job_title']); ?></td>
                                <td><?php echo htmlspecialchars($rows['experience']); ?></td>
                                <td><?php echo htmlspecialchars($rows['about']); ?></td>
                                <td><img src="image/<?php echo htmlspecialchars($rows['image']); ?>" height="100px" width="100px"></td>
                                <td><a href="vacancies_delete.php?id=<?php echo htmlspecialchars($rows['id']); ?>" class="mx-5"><i class="fa-solid fa-trash text-primary"></i></a></td>
                                <td><a href="vacancies_edit.php?id=<?php echo htmlspecialchars($rows['id']); ?>" class="mx-5"><i class="fa-solid fa-pen-to-square text-primary"></i></a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Start -->
    <div class="modal fade" id="example" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog custom-modal">
            <div class="modal-content custom-content">
                <div class="modal-header">
                    <h6 class="modal-title fw-bold text-primary" id="exampleModalLabel">Add Vacancies</h6>
                    <button type="button" id="btn2" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Office</label>
                                <input type="text" value="<?php echo htmlspecialchars($_SESSION['office_name']); ?>" name="office_name" class="form-control" readonly>
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Job Title</label>
                                <input type="text" name="job_title" class="form-control" placeholder="Enter Job Title!" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Experience</label>
                                <input type="text" name="experience" class="form-control" placeholder="Enter Experience" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="">About</label>
                                <textarea name="about" class="form-control" id="about" cols="6" rows="2" placeholder="Enter About" required></textarea>
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Images</label>
                                <input type="file" name="image" class="form-control" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary mt-3 fw-bold"><i class="fa-solid fa-plus"></i> Add!</button>
                        </form>
                    </div>
                    <?php
                    if (isset($_POST['submit'])) {
                        $office_name = mysqli_real_escape_string($conn, $_POST['office_name']);
                        $job_title = mysqli_real_escape_string($conn, $_POST['job_title']);
                        $experience = mysqli_real_escape_string($conn, $_POST['experience']);
                        $about = mysqli_real_escape_string($conn, $_POST['about']);
                        $image = $_FILES['image']['name'];
                        $file_tmp = $_FILES['image']['tmp_name'];
                        move_uploaded_file($file_tmp, "image/" . $image);

                        $sql = "INSERT INTO vacancies (office_name, job_title, experience, about, image) VALUES ('$office_name', '$job_title', '$experience', '$about', '$image')";

                        if (mysqli_query($conn, $sql)) {
                            // Send email notification
                            $result = mysqli_query($conn, "SELECT user_email FROM user_login");

                            if ($result) {
                                $mail = new PHPMailer(true);
                                try {
                                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                                    $mail->isSMTP();
                                    $mail->Host       = 'smtp.gmail.com';
                                    $mail->SMTPAuth   = true;
                                    $mail->Username   = 'mushtaqueimama@gmail.com';
                                    $mail->Password   = 'llfegxrlynyzregx';
                                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                                    $mail->Port       = 465;
                                    $mail->setFrom('your_email@gmail.com', 'Kaam Ka Caravan');
                                    $mail->isHTML(true);
                                    $mail->Subject = 'New Vacancies Posted on Our Site!';
                                    $mail->Body    = "We are excited to inform you that new vacancies have been posted on our site. Please visit our website to check out the latest opportunities.<br><br>Best regards,<br>Kaam Ka Caravan";

                                    // Loop through the result set and send email to each address
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $mail->addAddress($row['user_email']);
                                    }

                                    // Send the email
                                    $mail->send();
                                    echo "<script>
                                    swal('Good job!', 'Vacancy Added and Emails Sent successfully!', 'success')
                                        .then(() => {
                                            window.location.href='add_vacancies.php';
                                        });
                                        </script>";
                                } catch (Exception $e) {
                                    echo "<script>
                                    swal('Oops!', 'Error sending emails! Mailer Error: {$mail->ErrorInfo}', 'error');
                                        </script>";
                                }
                            } else {
                                echo "<script>
                                swal('Oops!', 'Error fetching emails from database!', 'error');
                                    </script>";
                            }
                        } else {
                            echo "<script>
                            swal('Oops!', 'Error adding vacancy!', 'error');
                                </script>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php include("footer.php"); ?>
