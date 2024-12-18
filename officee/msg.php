<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <style>
        body {
            background: linear-gradient(#26213671, #722f377e);
            font-family: 'Arial', sans-serif;
            color: #ffffff;
        }
        .work {
            margin-top: 150px;
        }
        .main-container {
            background: linear-gradient(#262136, #722F37);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1, h4 {
            margin-bottom: 20px;
        }
        #btn {
            background-color: white;
            color: black;
            border: 2px solid #722F37;
            transition: all 0.3s ease-in-out;
        }
        #btn:hover {
            background-color: #722F37;
            color: white;
        }
        .btn-container {
            display: flex;
            justify-content: center;
        }
        @media (max-width: 768px) {
            .main-container {
                padding: 20px;
            }
            h1 {
                font-size: 1.5rem;
            }
            h4 {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="work">
        <div class="main-container col-lg-8 container">
            <div class="row">
                <div class="mx-auto text-center">
                    <h1 class="fw-bold">Wait For Your Approval</h1>
                    <h4 class="fw-bold">OR</h4>
                    <div class="btn-container">
                        <a style="text-decoration: none;" href="./code.php">
                            <button type="submit" name="code" id="btn" class="btn m-3">Enter Your Code</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
