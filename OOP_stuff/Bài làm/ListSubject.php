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
    <title>Danh sách môn</title>
</head>

<body>
    <div class="container">
        <?php require_once "Connection.php"; ?>
        <?php
        $sql = "SELECT S.*, T.FirstName, T.LastName FROM Subject S JOIN Teacher T ON S.TeacherId = T.Id ORDER BY Id ASC";
        $result = Connection::ExecuteSelectQuery($sql);
        $i = 1;
        ?>

        <form method="post">
            <table class="table table-dark table-hover text-center">
                <thead class="thead-light">
                    <tr>
                        <th>STT</th>
                        <th>Tên môn học</th>
                        <th>Credit</th>
                        <th>Hệ số</th>
                        <th>Giảng viên</th>
                        <th>
                            <button type="submit" name="allow" class="btn btn-info text-dark text-center"><i class="fa fa-check" aria-hidden="true"></i></button>
                            Status
                            <button type="submit" name="deny" class="btn btn-secondary text-dark text-center"><i class="fa fa-times" aria-hidden="true"></i></button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                        if (isset($_POST["allow"])) {
                            if ($row->Status) { ?>
                                <tr>
                                    <td><?php echo $i++; ?>
                                    </td>
                                    <td><?php echo $row->Name; ?>
                                    </td>
                                    <td><?php echo $row->Credit; ?>
                                    </td>
                                    <td><?php echo $row->Multiplier; ?>
                                    </td>
                                    <td><?php echo $row->FirstName;
                                        echo " ";
                                        echo $row->LastName; ?>
                                    <td>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input class="custom-control-input" type="checkbox" name="status" value="true" <?php if ($row->Status) echo "checked"; ?> readonly>
                                            <label class="custom-control-label"></label>
                                        </div>
                                    </td>
                                </tr>
                            <?php }
                        } else if (isset($_POST["deny"])) {
                            if ($row->Status != 1) {
                            ?>
                            <tr>
                                <td><?php echo $i++; ?>
                                </td>
                                <td><?php echo $row->Name; ?>
                                </td>
                                <td><?php echo $row->Credit; ?>
                                </td>
                                <td><?php echo $row->Multiplier; ?>
                                </td>
                                <td><?php echo $row->FirstName;
                                    echo " ";
                                    echo $row->LastName; ?>
                                <td>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input class="custom-control-input" type="checkbox" name="status" value="true" <?php if ($row->Status) echo "checked"; ?> readonly>
                                        <label class="custom-control-label"></label>
                                    </div>
                                </td>
                            </tr>
                        <?php
                            }
                        } else {
                        ?>
                            <tr>
                                <td><?php echo $i++; ?>
                                </td>
                                <td><?php echo $row->Name; ?>
                                </td>
                                <td><?php echo $row->Credit; ?>
                                </td>
                                <td><?php echo $row->Multiplier; ?>
                                </td>
                                <td><?php echo $row->FirstName;
                                    echo " ";
                                    echo $row->LastName; ?>
                                <td>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input class="custom-control-input" type="checkbox" name="status" value="true" <?php if ($row->Status) echo "checked"; ?> readonly>
                                        <label class="custom-control-label"></label>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        } ?>
                </tbody>
            </table>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>