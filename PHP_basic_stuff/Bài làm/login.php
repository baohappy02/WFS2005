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
    <title>Đăng nhập</title>
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
if (isset($_POST["tenTK"])) {
    if (
        $_POST["mk"] == $_COOKIE["mk"] && $_POST["tenTK"] == $_COOKIE["tenTK"]
    ) {
        echo "<script>alert('Đăng nhập thành công')</script>";
        header("Location: account.php");
    } else {
        echo "Đăng nhập thất bại";
    }
} else {
?>
    <div class="box">
        <form method="post">
            <h3 class="lla">Tên tài khoản: <input type="text" name="tenTK" required autofocus><br></h3>
            <h3 class="lla">Mật khẩu: <input type="password" name="mk" required><br></h3>
            <h3><button type="submit" class="sss">Đăng nhập</button>
                <button type="reset" class="sss">Hủy bỏ</button></h3>
        </form>
    </div>
<?php
}
include_once("../LeQuocBao_02/layout/footer.php");
include_once("../LeQuocBao_02/layout/body_script.php");
ob_end_flush();
?>

</html>