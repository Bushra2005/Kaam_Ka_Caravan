<?php
include("header.php");
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

</head>
<style>
/* General content-body styling */
.content-body {
    background: url('https://your-image-url.com/background.jpg') no-repeat center center fixed;
    background-size: cover;
    padding: 20px 0;
}

/* Container styling */
.container {
    background-color: rgba(255, 255, 255, 0.9); /* Slightly opaque white background */
    border-radius: 10px;
    padding: 30px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

/* Profile header styling */
.profile-header {
    margin-bottom: 30px;
}

.profile-image {
    border-radius: 50%;
    width: 120px;
    height: 120px;
    object-fit: cover;
    margin-bottom: 15px;
}

/* Profile section styling */
.profile-section {
    background: url('https://d35mbwdnoe7hvk.cloudfront.net/wp-content/uploads/2023/02/horizontal-murphy-bed-opened-desk-white-rustic-washed-finish-california-closets.jpg') no-repeat center center;
    background-size: cover;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Profile info styling */
.profile-info {
    background-color: rgba(255, 255, 255, 0.8); /* Slightly opaque white background */
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.profile-info-item {
    margin-bottom: 20px;
}

.profile-info-item label {
    display: block;
    font-weight: 600;
    color: #333;
    margin-bottom: 5px;
}

.profile-info-value {
    font-size: 1.1em;
    color: #555;
}

/* Button styling */
.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    border-radius: 5px;
    padding: 10px 20px;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #004085;
}

/* Modal styling */
.modal-content {
    border-radius: 10px;
}

.modal-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid #e9ecef;
}

.modal-title {
    color: #007bff;
}

.modal-body .form-label {
    font-weight: 600;
    color: #333;
}

.modal-body .form-control {
    border-radius: 5px;
    box-shadow: none;
    border: 1px solid #ced4da;
}

.modal-body .form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
}

.modal-footer {
    background-color: #f8f9fa;
    border-top: 1px solid #e9ecef;
}

.text-note {
    font-size: 0.9em;
    color: #6c757d;
}

/* General profile-info styling */
.profile-info-item {
    margin-bottom: 20px;
    display: flex;
    align-items: center;
}

/* Label styling */
.profile-info-item label {
    display: flex;
    align-items: center;
    font-weight: 600;
    color: #333;
    font-size: 1.1em;
}

.profile-info-item i {
    margin-right: 10px; /* Spacing between the icon and the label text */
    color: #007bff; /* Icon color */
}

/* Value styling */
.profile-info-value {
    font-size: 1.1em;
    color: #555;
}


</style>
<body>
<div class="content-body">
    <div class="container">
        <div class="pcoded-content text-center p-5">
            <div class="profile-header">
                <img src="https://freesvg.org/img/abstract-user-flat-4.png" alt="Office Image" class="profile-image">
                <h3 class="fw-bold text-primary mb-4"><i class="fas fa-user"></i> My Profile</h3>
            </div>
            <div class="profile-section">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <?php
                        $office_name = $_SESSION['office_name'];
                        $sql = "SELECT * FROM office_req WHERE username = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("s", $office_name);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($rows = $result->fetch_assoc()) {
                        ?>
                           <div class="profile-info mb-4">
    <div class="profile-info-item">
        <label for="username" class="form-label">
            <i class="fas fa-building"></i> Office Name :
        </label>
        <h3 class="profile-info-value"><?php echo htmlspecialchars($rows['username']); ?></h3>
    </div>
    <div class="profile-info-item">
        <label for="email" class="form-label">
            <i class="fas fa-envelope"></i> Office Email :
        </label>
        <h3 class="profile-info-value"><?php echo htmlspecialchars($rows['office_email']); ?></h3>
    </div>
    <div class="profile-info-item">
        <label for="password" class="form-label">
            <i class="fas fa-lock"></i> Office Password :
        </label>
        <h3 class="profile-info-value">****</h3>
    </div>
</div>

                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-lg-6 text-lg-end">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                            <i class="fas fa-edit"></i> Edit Your Profile
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal start -->
        <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title text-primary fw-bold" id="editProfileModalLabel">Edit Profile</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <div class="mb-4">
                                <label for="name" class="form-label">Username:</label>
                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($rows['username']); ?>" name="username" id="name" required>
                            </div>
                            <div class="mb-4">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" value="<?php echo htmlspecialchars($rows['office_email']); ?>" name="email" id="email" required>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                            <button type="submit" name="update" class="btn btn-primary fw-bold">Update</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <h6 class="text-note text-primary">Note:</h6>
                        <p class="text-note">Please use uppercase letters for your username.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->
    </div>
</div>




    <?php
    if (isset($_POST['update'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
        $office_name = $_SESSION['office_name'];

        $sql = "UPDATE office_req SET username = ?, office_email = ?, office_password = ? WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $username, $email, $password, $office_name);

        if ($stmt->execute()) {
            echo "<script>
            Swal.fire('Success!', 'Your profile has been updated.', 'success')
            window.location.href='profile.php';
            </script>";
        } else {
            echo "<script>
            Swal.fire('Error!', 'Update failed.', 'error')
            </script>";
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
<?php include("footer.php"); ?>
