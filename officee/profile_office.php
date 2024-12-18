<?php
include("connection.php");
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
</head>
<style>
    .card-body{
        height: 380px;
    }
</style>
<body>
    <div class="content-body">
        <div class="container-fluid">
        <div class="container-fluid">
    <div class="row">
        <!-- Card 1 -->
        <div class="col-lg-4"> <!-- Use col-lg-4 for three cards per row -->
            <div class="card" style="border:  3px solid #007bff">
                <div class="card-body">
                    <h2 class="text-primary">Account Information</h2>
                    <?php
                    $office_name = $_SESSION['office_name'];
                    $sql = "SELECT * FROM profile_office WHERE office_name = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $office_name);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($rows = $result->fetch_assoc()) {
                    ?>
                        <p class="card-text"><?php echo htmlspecialchars($rows['office_name']); ?></p>
                        <p class="card-text"><?php echo htmlspecialchars($rows['email']); ?></p>
                        <p class="card-text"><?php echo htmlspecialchars($rows['contact']); ?></p>
                        <a href="#"  class="btn btn-primary card-link"  data-bs-toggle="modal" data-bs-target="#exampleModal1">
                            <i class="text-white fas fa-edit"></i> Edit
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-lg-4"> <!-- Use col-lg-4 for three cards per row -->
            <div class="card" style="border:  3px solid #007bff">
                <div class="card-body">
                    <h2 class="text-primary">Information</h2>
                    <?php
                    $office_name = $_SESSION['office_name'];
                    $sql = "SELECT * FROM profile_office WHERE office_name = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $office_name);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($rows = $result->fetch_assoc()) {
                    ?>
                        <p><?php echo $rows['location']; ?></p>
                        <p><?php echo $rows['timing']; ?></p>
                        <p><?php echo $rows['links']; ?></p>
                        <a href="#"  class="btn btn-primary card-link text-white" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-lg-4"> <!-- Use col-lg-4 for three cards per row -->
            <div class="card" style="border:  3px solid #007bff">
                <div class="card-body ">
                    <h2 class="text-primary">Keywords</h2>
                    <?php
                    $office_name = $_SESSION['office_name'];
                    $sql = "SELECT * FROM profile_office WHERE office_name = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $office_name);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($rows = $result->fetch_assoc()) {
                    ?>
                        <p><i class="fas fa-key"></i> <?php echo $rows['keyword1']; ?></p>
                        <p><i class="fas fa-key"></i> <?php echo $rows['keyword2']; ?></p>
                        <p><i class="fas fa-key"></i> <?php echo $rows['keyword3']; ?></p>
                        <a href="#" class="btn btn-primary card-link text-white"  data-bs-toggle="modal" data-bs-target="#exampleModal3">
                            <i class="text-white fas fa-edit"></i> Edit
                        </a>
                        <?php } ?>
                    </div>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-lg-12">
    <div class="card" style="border:  3px solid #007bff">
                <div class="card-body1 p-3">
                    <h2 class="text-primary">Office About</h2>
                    <h6 class="card-subtitle mb-2 ">About:</h6>
                    <?php
                        $sql = "SELECT * FROM profile_office WHERE office_name = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("s", $office_name);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if ($rows = $result->fetch_assoc()) {
                        ?> 
                    <p class="card-text"><?php echo htmlspecialchars($rows['about_office']); ?></p>
                    <a href="#" class="btn btn-primary card-link text-white" data-bs-toggle="modal" data-bs-target="#exampleModal4">
                        <i class="text-white fas fa-edit"></i> Edit
                    </a>
                </div>
            </div>
            <?php } ?>
    </div>
</div>
</div>

        </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>

<?php
include("footer.php");
?>
<!-- modal:1 start -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Account Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >
                        <div class="container">
                            <div class="row">
                                <?php
                                                 $office_name = $_SESSION['office_name'];
                                                 $sql = "SELECT * FROM profile_office WHERE office_name = ?";
                                                 $stmt = $conn->prepare($sql);
                                                 $stmt->bind_param("s", $office_name);
                                                 $stmt->execute();
                                                 $result = $stmt->get_result();

                                if ($rows = $result->fetch_assoc()) {
                                ?>
                                    <div class="col-lg-12">
                                        <form method="POST">
                                            <div class="mb-3">
                                                <label for="name" class="form-label"><strong>Office Name:</strong></label>
                                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($rows['office_name']); ?>" name="officeName" id="officeName" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label"><strong>Email:</strong></label>
                                                <input type="email" class="form-control" value="<?php echo htmlspecialchars($rows['email']); ?>" name="email" id="email" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="contact" class="form-label"><strong>Contact:</strong></label>
                                                <input type="text" value="<?php echo htmlspecialchars($rows['contact']); ?>" class="form-control" name="contact" id="contact" required>
                                            </div>
                                            <button type="submit" name="update1" class="btn btn-primary mt-3 fw-bold">Update</button>
                                        </form>
                                    </div>

                                <?php } ?>
                            </div>
                        </div>
                    </div>
      
    </div>
  </div>
</div>
<!-- modal:1 end -->

<!-- modal:2 start -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >
                        <div class="container">
                            <div class="row">
                                <?php
                                                 $office_name = $_SESSION['office_name'];
                                                 $sql = "SELECT * FROM profile_office WHERE office_name = ?";
                                                 $stmt = $conn->prepare($sql);
                                                 $stmt->bind_param("s", $office_name);
                                                 $stmt->execute();
                                                 $result = $stmt->get_result();

                                if ($rows = $result->fetch_assoc()) {
                                ?>
                                    <div class="col-lg-12">
                                        <form method="POST">
                                            <div class="mb-3">
                                                <label for="location" class="form-label"><strong>Location:</strong></label>
                                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($rows['location']); ?>" name="location" id="location" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="timing" class="form-label"><strong>Timing:</strong></label>
                                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($rows['timing']); ?>" name="timing" id="timing" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="links" class="form-label"><strong>Links:</strong></label>
                                                <input type="text" value="<?php echo htmlspecialchars($rows['links']); ?>" class="form-control" name="links" id="links" required>
                                            </div>
                                            <button type="submit" name="update3" class="btn btn-primary mt-3 fw-bold">Update</button>
                                        </form>
                                    </div>

                                <?php } ?>
                            </div>
                        </div>
                    </div>
      
    </div>

    </div>
  </div>
</div>
<!-- modal:2 end -->



<!-- modal:3 start -->
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Keyword</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >
                        <div class="container">
                            <div class="row">
                                <?php
                                                 $office_name = $_SESSION['office_name'];
                                                 $sql = "SELECT * FROM profile_office WHERE office_name = ?";
                                                 $stmt = $conn->prepare($sql);
                                                 $stmt->bind_param("s", $office_name);
                                                 $stmt->execute();
                                                 $result = $stmt->get_result();

                                if ($rows = $result->fetch_assoc()) {
                                ?>
                                    <div class="col-lg-12">
                                        <form method="POST">
                                            <div class="mb-3">
                                                <label for="keyword1" class="form-label"><strong>Keyword:01:</strong></label>
                                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($rows['keyword1']); ?>" name="keyword1" id="keyword1" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="keyword2" class="form-label"><strong>Keyword:02:</strong></label>
                                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($rows['keyword2']); ?>" name="keyword2" id="keyword2" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="keyword3" class="form-label"><strong>Keyword:03:</strong></label>
                                                <input type="text" value="<?php echo htmlspecialchars($rows['keyword3']); ?>" class="form-control" name="keyword3" id="keyword3" required>
                                            </div>
                                            <button type="submit" name="update2" class="btn btn-primary mt-3 fw-bold">Update</button>
                                        </form>
                                    </div>

                                <?php } ?>
                            </div>
                        </div>
                    </div>
      
    </div>
    </div>
  </div>
</div>
<!-- modal:3 end -->


<!-- modal:4 start -->
<div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Office About</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >
                        <div class="container">
                            <div class="row">
                                <?php
                                                 $office_name = $_SESSION['office_name'];
                                                 $sql = "SELECT * FROM profile_office WHERE office_name = ?";
                                                 $stmt = $conn->prepare($sql);
                                                 $stmt->bind_param("s", $office_name);
                                                 $stmt->execute();
                                                 $result = $stmt->get_result();

                                if ($rows = $result->fetch_assoc()) {
                                ?>
                                    <div class="col-lg-12">
                                        <form method="POST">
                                            <div class="mb-3">
                                                <label for="about_office" class="form-label"><strong>About:</strong></label>
                                                <input type="text" value="<?php echo htmlspecialchars($rows['about_office']); ?>" class="form-control" name="about_office" id="about_office" required>
                                            </div>
                                            <button type="submit" name="update" class="btn btn-primary mt-3 fw-bold">Update</button>
                                        </form>
                                    </div>

                                <?php } ?>
                            </div>
                        </div>
                    </div>
      
    </div>
    </div>
  </div>
</div>
<!-- modal:4 end -->
<?php
    if (isset($_POST['update1'])) {
        $officeName = $_POST['officeName'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $office_name = $_SESSION['office_name'];

        $sql = "UPDATE profile_office SET office_name = ?,email = ?, contact = ? WHERE office_name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $officeName, $email, $contact, $office_name);

        if ($stmt->execute()) {
            echo "<script>
            Swal.fire('Success!', 'Your profile has been updated.', 'success')
            window.location.href='profile_office.php';
            </script>";
        } else {
            echo "<script>
            Swal.fire('Error!', 'Update failed.', 'error')
            </script>";
        }
    }
    ?>

<?php
    if (isset($_POST['update2'])) {
        $keyword1 = $_POST['keyword1'];
        $keyword2 = $_POST['keyword2'];
        $keyword3 = $_POST['keyword3'];
        $office_name = $_SESSION['office_name'];

        $sql = "UPDATE profile_office SET keyword1 = ?,keyword2 = ?, keyword3= ? WHERE office_name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $keyword1, $keyword2, $keyword3, $office_name);

        if ($stmt->execute()) {
            echo "<script>
            Swal.fire('Success!', 'Your profile has been updated.', 'success')
            window.location.href='profile_office.php';
            </script>";
        } else {
            echo "<script>
            Swal.fire('Error!', 'Update failed.', 'error')
            </script>";
        }
    }
    ?>
    <?php
    if (isset($_POST['update3'])) {
        $location = $_POST['location'];
        $timing = $_POST['timing'];
        $links = $_POST['links'];
        $office_name = $_SESSION['office_name'];

        $sql = "UPDATE profile_office SET location = ?,timing = ?, links= ? WHERE office_name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $location, $timing, $links, $office_name);

        if ($stmt->execute()) {
            echo "<script>
            Swal.fire('Success!', 'Your profile has been updated.', 'success')
            window.location.href='profile_office.php';
            </script>";
        } else {
            echo "<script>
            Swal.fire('Error!', 'Update failed.', 'error')
            </script>";
        }
    }
    ?>
<?php
if (isset($_POST['update'])) {
    $about_office = $_POST['about_office'];
    $office_name = $_SESSION['office_name'];

    $sql = "UPDATE profile_office SET about_office = ? WHERE office_name = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo "<script>Swal.fire('Error!', 'Prepare statement failed: " . htmlspecialchars($conn->error) . "', 'error')</script>";
        exit;
    }

    $stmt->bind_param("ss", $about_office, $office_name);

    if ($stmt->execute()) {
        echo "<script>
        Swal.fire('Success!', 'Your profile has been updated.', 'success');
        window.location.href='profile_office.php';
        </script>";
    } else {
        echo "<script>
        Swal.fire('Error!', 'Update failed: " . htmlspecialchars($stmt->error) . "', 'error');
        </script>";
    }

    $stmt->close();
}

    ?>