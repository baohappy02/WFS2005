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
    <title>Tính toán</title>
    <style>
        .box {
            margin-left: 500px;
            margin-bottom: 200px;
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

if (isset($_POST["submit"])) {
    $a = $_POST["canha"];
    $a2 = $a * $a;
    $b = $_POST["canhb"];
    $b2 = $b * $b;
    $c = $_POST["canhc"];
    $c2 = $c * $c;
    if (($a + $b) > $c && ($b + $c) > $c && ($c + $a) > $b) {
        echo "<h3 class='lla'>Cả 3 cạnh a, b, c đều là cạnh của tam giác.<br>";
        echo "Loại tam giác: ";
        if ($a == $b && $b == $c) {
            echo " đây là tam giác đều.<br>";
        } else if ($a2 == $b2 + $c2 or $b2 == $a2 + $c2 or $c2 == $b2 + $a2) {
            echo " đây là tam giác vuông.<br>";
        } else {
            echo " đây là tam giác thường.<br>";
        }

        $p = ($a + $b + $c) / 2;
        echo "Có chu vi: " . (2 * $p) . ".<br>";
        echo "Có diện tích: " . sqrt($p * ($p - $a) * ($p - $a) * ($p - $a)) . ".</h3><br>";
    } else {
        echo "<h3 class'lla'>Cả 3 cạnh a, b, c không phải là cạnh của tam giác</h3>";
    }
} else {
?>
    <div class="box">
        <form method="post">
            <h3 class="lla">Nhập cạnh a: <input type="text" name="canha" class="canha" autofocus></h3>
            <h3 class="lla">Nhập cạnh b: <input type="text" name="canhb" class="canhb"></h3>
            <h3 class="lla">Nhập cạnh c: <input type="text" name="canhc" class="canhc"></h3>
            <button type="submit" class="sss" name="submit">Tính</button>
    </div>
<?php
}
ob_end_flush();
include_once("../LeQuocBao_02/layout/footer.php");
include_once("../LeQuocBao_02/layout/body_script.php");
?>

</html>