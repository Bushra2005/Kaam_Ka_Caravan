<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Office Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<?php
session_start();
include("connection.php"); // Make sure to include your database connection

if(isset($_POST['submit'])){
    $email = $_POST['office_email'];
    $password = $_POST['office_password'];

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM office_req WHERE office_email = ? AND office_password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $office_name = $data['username'];
        $status = $data['status'];

        if($status == 1){
            $_SESSION['office_name'] = $office_name;
            echo "<script>
                swal('Login successful!', 'You are now logged in.', 'success').then(() => {
                    setTimeout(function(){
                        window.location.href = 'index.php';
                    }, 3000);
                });
            </script>";
        } else {
            echo "<script>
                swal('Login failed', 'Account is inactive. Please contact support.', 'error');
            </script>";
        }
    } else {
        echo "<script>
            swal('Login failed', 'Invalid email or password.', 'error');
        </script>";
    }
}
?>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> Sign In </h2>
    <a href="./signup.php"><h2 class="inactive underlineHover">Sign Up </h2></a>

    <!-- Icon -->
    <div class="fadeIn first">
    </div>

    <!-- Login Form -->
    <form method="post" action="">
      <input type="text" id="login" class="fadeIn second mt-5" name="office_email" placeholder="Email" required>
      <input type="password" id="password" class="fadeIn third" name="office_password" placeholder="Password" required>
      <input type="submit" class="fadeIn fourth" name="submit" value="Log In">
    </form>
  </div>
</div>
</body>
</html>
