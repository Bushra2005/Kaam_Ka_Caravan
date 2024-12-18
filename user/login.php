<?php

session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> User Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
<!-- Tabs Titles -->
<a href="./signup.php"><h2 class="active btn btn-primary underlineHover"><i class="fas fa-user-plus"></i> Sign Up</h2></a>

    <h1>Welcome to Kaam Ka کاروان! Your Workspace Awaits, Log In Now!</h1>
    <div class="fadeIn first">
    </div>
    <!-- Login Form -->
    <form method="post" action="">
    <div class="input-group">
        <i class="fas fa-envelope"></i>
        <input type="text" id="login" name="email" placeholder="Email" required style="width: 100%;">
      </div>
      <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" id="password" name="password" placeholder="Password" required style="width: 100%;">
      </div>
      <input type="submit" class="fadeIn fourth" name="submit" value="Log In">
    </form>
    <div class="social-icons">
      <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
      <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
      <a href="#" class="social-icon"><i class="fab fa-whatsapp"></i></a>
      <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
    </div>
  </div>
</div>

<?php

include("connection.php");

if(isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM user_login WHERE user_email = ? AND user_password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if($data) {
        $_SESSION['username'] = $data['username'];
        echo "<script>
                swal('Login successful!', 'You are now logged in.', 'success').then(() => {
                    window.location.href='index.php';
                });
              </script>";
    } else {
        echo "<script>
                swal('Login failed', 'Invalid email or password', 'error');
              </script>";
    }
}
?>
</body>
</html>
