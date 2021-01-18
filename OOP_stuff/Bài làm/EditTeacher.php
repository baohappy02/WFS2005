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
    <title>Chỉnh sửa</title>
</head>

<body>
    <div class="container w-25">
        <?php require_once "Connection.php"; ?>

        <?php
        if (isset($_POST["edit"])) {
            $sql = "UPDATE Teacher 
            SET 
                FirstName = :firstName, LastName = :lastName, Salary = :salary, Status = :status
            WHERE 
                Id = :id";
            $params = array(
                "id" => $_GET["id"],
                "firstName" => $_POST["firstName"],
                "lastName" => $_POST["lastName"],
                "salary" => $_POST["salary"],
                "status" => isset($_POST["status"]) ? 1 : 0,
            );
            $result = Connection::ExecuteNonQuery($sql, $params);
            header("Location: ListTeacher.php");
        } else {
        ?>
            <?php
            $sql = "SELECT * FROM Teacher WHERE Id=:id";
            $params = array("id" => $_GET["id"]);
            $result = Connection::ExecuteSelectQuery($sql, $params);
            $row = $result->fetch(PDO::FETCH_OBJ);
            ?>

            <h2 class="text-center">FORM</h2>
            <form method="post">
                <div class="form-group">
                    <label for="firstName">Họ</label>
                    <input id="firstName" class="form-control" type="text" name="firstName" value="<?php echo $row->FirstName; ?>" required>
                </div>
                <div class="form-group">
                    <label for="lastName">Tên</label>
                    <input id="lastName" class="form-control" type="text" name="lastName" value="<?php echo $row->LastName; ?>" required>
                </div>
                <div class="form-group">
                    <label for="salary">Lương</label>
                    <input id="salary" class="form-control" type="number" name="salary" value="<?php echo $row->Salary; ?>" required>
                </div>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="status" value="true" checked>
                    <label class="custom-control-label"> Còn hoạt động</label>
                </div>
                <button class="btn btn-success btn-block text-dark" type="submit" name="edit"><i class="fa fa-pencil" aria-hidden="true"></i> Chỉnh sửa</button>
                <button class="btn btn-danger btn-block text-dark" type="reset"><i class="fa fa-times" aria-hidden="true"></i> Hủy chỉnh sửa</button>
            </form>
        <?php
        }
        ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>