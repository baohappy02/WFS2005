<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Thêm giảng viên</title>
</head>

<body>
    <div class="container">
        <?php require_once "Connection.php"; ?>
        <?php
        if (isset($_POST["add"])) {
            $sql = "INSERT INTO Teacher (FirstName, LastName, Salary, Status) VALUES (:firstName, :lastName, :salary, :status)";
            $params = array(
                "firstName" => $_POST["firstName"],
                "lastName" => $_POST["lastName"],
                "salary" => $_POST["salary"],
                "status" => isset($_POST["status"]) ? 1 : 0
            );
            if (Connection::ExecuteNonQuery($sql, $params) > 0) {
                header("Location: ListTeacher.php");
            } else {
                echo "Thêm thất bại.";
            }
        } else {
        ?>
        <form method="post">
            <div class="form-group">
                <label for="firstName">Họ</label>
                <input id="firstName" class="form-control" type="text" name="firstName" required>
            </div>
            <div class="form-group">
                <label for="lastName">Tên</label>
                <input id="lastName" class="form-control" type="text" name="lastName" required>
            </div>
            <div class="form-group">
                <label for="salary">Lương</label>
                <input id="salary" class="form-control" type="number" name="salary" required>
            </div>
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" name="status" value="true" checked>
                <label class="custom-control-label"> Còn hoạt động</label>
            </div>
            <button type="submit" class="btn btn-info text-dark" name="add"><i class="fa fa-plus" aria-hidden="true"></i> Thêm</button>
            <button type="reset" class="btn btn-danger text-dark"><i class="fa fa-times" aria-hidden="true"></i> Hủy thêm</button>
        </form>
        <?php } ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>