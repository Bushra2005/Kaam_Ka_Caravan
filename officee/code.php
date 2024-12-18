<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active">Verification Code</h2>

    <!-- Icon -->
    <div class="fadeIn first">
    </div>

    <!-- Verification Form -->
    <form method="post" action="">
      <input type="text" id="code" class="fadeIn second" name="code" placeholder="Enter Code" required>
      <input type="submit" class="fadeIn fourth" name="verify" value="Verify">
    </form>
  </div>
</div>

<?php
session_start();

if (!isset($_SESSION['confirm_code'])) {
    echo "<script>
            swal('Error', 'No verification code found.', 'error');
          </script>";
    exit;
}

$code = $_SESSION['confirm_code'];

if(isset($_POST['verify'])) {
    $enteredCode = $_POST['code'];

    if($enteredCode == $code) {
        echo "<script>
                swal('Code Is Correct!', 'You can now log in.', 'success').then(() => {
                    window.location.href='login.php';
                });
              </script>";
    } else {
        echo "<script>
                swal('Incorrect code.', 'Please try again.', 'error');
              </script>";
    }
}
?>
</body>
</html>
