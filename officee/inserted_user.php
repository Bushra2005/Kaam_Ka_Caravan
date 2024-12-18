<?php
include("header.php");
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserted Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="content-body">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                <h3 class="text-primary text-center">Inserted Users<i class="fas fa-users"></i></h1>

                        <h4 class="card-title text-dark"></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-container">
                            <table class="table table-responsive-sm mx-auto text-center">
                                <thead class="text-primary">
                                    <tr >
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Start Date</th>
                                        <th>Phone</th>
                                        <th>Gender</th>
                                        <th>CV</th>
                                        <th>Send Message</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $office_name = $_SESSION['office_name'];
                                    $sql = "SELECT * FROM job_application WHERE office_name = ?";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->bind_param("s", $office_name);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    while ($rows = $result->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($rows['id']); ?></td>
                                            <td><?php echo htmlspecialchars($rows['name']); ?></td>
                                            <td><?php echo htmlspecialchars($rows['email']); ?></td>
                                            <td><?php echo htmlspecialchars($rows['start_date']); ?></td>
                                            <td><?php echo htmlspecialchars($rows['phone']); ?></td>
                                            <td><?php echo htmlspecialchars($rows['gender']); ?></td>
                                            <td>
                                                <a class="text-dark" href="../../User_Panel/user/uploads/<?php echo htmlspecialchars($rows['cv']); ?>" target="_blank">
                                                    <i class="text-primary fa-solid fa-download"></i> <?php echo htmlspecialchars($rows['cv']); ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="send_message.php?id=<?php echo htmlspecialchars($rows['id']); ?>" class="mx-5 text-primary">
                                                    <i class="fa-solid fa-message"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="job_application_delete.php?id=<?php echo htmlspecialchars($rows['id']); ?>" class="mx-5 text-primary">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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