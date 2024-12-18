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
<body>
    <div class="content-body" >
    <div class="container">
        <div class="pcoded-content text-center p-5" style="border: 4px solid #007bff ";>
            <h3 class="fw-bold text-primary mb-4"><i class="fas fa-user"></i> My Profile</h1>
            <div class="profile-section" >
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
                            <div class="mb-3">
                                <label for="username" class="text-primary" style="font-size: 20px;">Office Name:</label>
                                <h3 class="text-dark">
                                    <?php echo htmlspecialchars($rows['username']); ?>
                                </h3>
                            </div>
                            <div class="mb-3">
                                <label for="email" style="font-size: 20px;" class="text-primary">Office Email:</label>
                                <h3 class="text-dark">
                                    <?php echo htmlspecialchars($rows['office_email']); ?>
                                </h3>
                            </div>
                            <div class="mb-3">
                                <label style="font-size: 20px;" class="text-primary" for="password">Office Password:</label>
                                <h3 class="text-dark">
                                    ****
                                </h3>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-lg-6">
                        <button class="btn btn-primary w-50" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                            <i class="fas fa-edit"></i> Edit Your Profile
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal start -->
        <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title text-primary fw-bold" id="editProfileModalLabel">Edit Profile</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" >
                        <div class="container">
                            <div class="row">
                                <?php
                                $sql = "SELECT * FROM office_req WHERE username = ?";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("s", $office_name);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                if ($rows = $result->fetch_assoc()) {
                                ?>
                                    <div class="col-lg-8">
                                        <form method="POST">
                                            <div class="mb-3">
                                                <label for="name" class="form-label"><strong>Username:</strong></label>
                                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($rows['username']); ?>" name="username" id="name" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label"><strong>Email:</strong></label>
                                                <input type="email" class="form-control" value="<?php echo htmlspecialchars($rows['office_email']); ?>" name="email" id="email" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label"><strong>Password:</strong></label>
                                                <input type="password" class="form-control" name="password" id="password" required>
                                            </div>
                                            <button type="submit" name="update" class="btn btn-primary mt-3 fw-bold">Update</button>
                                        </form>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="text-note text-primary">Note!</h6>
                                        <p class="text-note ">Please use uppercase letters for your username.</p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
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
