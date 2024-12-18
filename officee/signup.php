
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Office Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <a href="./login.php"><h2 class="inactive underlineHover">Sign In </h2></a>
    <h2 class="active"> Sign Up </h2>

    <!-- Icon -->
    <div class="fadeIn first">
    </div>

    <!-- Login Form -->
    <form method="post" action="">
      <input type="text" id="name" class="fadeIn second mt-5" name="name" placeholder="Username" required>
      <input type="text" id="login" class="fadeIn second " name="email" placeholder="Email" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password" required>
      <input type="submit" class="fadeIn fourth" name="register" value="Sign Up">
    </form>

    

  </div>
</div>

<?php
include("connection.php");

if (isset($_POST['register'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if the email already exists
    $checkEmailSql = "SELECT * FROM office_req WHERE office_email = ?";
    $stmt = $conn->prepare($checkEmailSql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Email already exists
        echo "<script>
                swal('Email already exists', 'Please use a different email address.', 'error');
              </script>";
    } else {
        // Email is unique, proceed with registration
        $sql = "INSERT INTO office_req (username, office_email, office_password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $password);

        if ($stmt->execute()) {
            echo "<script>
                    swal('Registration successful!', 'You can now log in.', 'success').then(() => {
                        window.location.href='code.php';
                    });
                  </script>";
        } else {
            echo "<script>
                    swal('Registration failed', 'Please try again.', 'error');
                  </script>";
        }
    }

    $stmt->close();
}
?>


</body>
</html>
