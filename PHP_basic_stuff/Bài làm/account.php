<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <?php include_once("../LeQuocBao_02/layout/head.php"); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Tài khoản</title>
    <style>
        .box {
            margin: 20px auto;
            padding: 20px;
            border: 3px solid lightgrey;
            width: 500px;
            border-radius: 5px;
        }

        input {
            padding: 4px;
            width: 100px;
            border: none;
            width: auto;
        }

        .lla {
            padding: 5px;
            border: 2px solid black;
            width: 450px;
            border-radius: 5px;
        }

        .sss {
            background-color: grey;
            color: white;
            padding: 14px 0;
            margin: 5 0 0 0;
            border: none;
            cursor: grabbing;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }
    </style>

<body>


</body>
<?php
ob_start();
include_once("../LeQuocBao_02/layout/header.php");
include_once("../LeQuocBao_02/layout/banner.php");

if (isset($_POST["update"])) {
    setcookie("mk", $_POST["mk"],  time() + 60 * 15 * 60 * 24, "/");
    setcookie("tenTK", $_POST["tenTK"], time() + 60 * 15 * 60 * 24, "/");
    setcookie("hoten", $_POST["hoten"], time() + 60 * 15 * 60 * 24, "/");
    setcookie("email", $_POST["email"], time() + 60 * 15 * 60 * 24, "/");
    setcookie("gioitinh", $_POST["gioitinh"], time() + 60 * 15 * 60 * 24, "/");
    echo "<script>alert 'Cập nhật thành công !!'</script>";
}
if (isset($_POST["logout"])) {
    setcookie("mk", $_POST["mk"],  time() - 1, "/");
    setcookie("tenTK", $_POST["tenTK"], time() - 1, "/");
    setcookie("hoten", $_POST["hoten"], time() - 1, "/");
    setcookie("email", $_POST["email"], time() - 1, "/");
    setcookie("gioitinh", $_POST["gioitinh"], time() - 1, "/");
    echo "<script>alert 'Đăng xuất thành công !!'</script>";
    header("Location: index.php");
}
?>
<div class="box">
    <form method="post">
        <h3 class="lla">Tên tài khoản: <input type="text" name="tenTK" value="<?php echo $_COOKIE['tenTK']; ?>"><br></h3>
        <h3 class="lla">Mật khẩu: <input type="password" name="mk" value="<?php $_SESSION['mk']; ?>"><br></h3>
        <h3 class="lla">Họ tên: <input type="text" name="hoten" value="<?php echo $_COOKIE['hoten']; ?>"><br></h3>
        <h3 class="lla">Email: <input type="email" name="email" value="<?php echo $_COOKIE["email"]; ?>"><br></h3>
        <h3 class="lla">
            Giới tính:<br>
            <input name="gioitinh" type="radio" value="nam" <?php if ($_COOKIE['gioitinh'] == 'nam') echo "checked"; ?> />Nam <br>
            <input name="gioitinh" type="radio" value="nu" <?php if ($_COOKIE['gioitinh'] == 'nu') echo "checked"; ?> />Nữ <br>
            <input name="gioitinh" type="radio" value="khac" <?php if ($_COOKIE['gioitinh'] == 'khac') echo "checked"; ?> />Khác<br>
        </h3>
        <h3><button type="submit" class="sss" name="update">Cập nhật thông tin</button>
            <button type="reset" class="sss">Hủy bỏ thay đổi</button>
            <button type="submit" class="sss" name="logout">Đăng xuất</button></h3>
    </form>
</div>
<?php

include_once("../LeQuocBao_02/layout/footer.php");
include_once("../LeQuocBao_02/layout/body_script.php");
ob_end_flush();
?>

</html>