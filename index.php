<?php
$url = $_GET['url'];
$path = $url . ".php";
$url = explode("/", $url);
$page = $url[1];

if ($_POST) {
    echo "<script>console.log('data');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.png">

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="/assets/css/animate.css">

    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="/assets/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/assets/plugins/fontawesome/css/all.min.css">


    <link rel="stylesheet" href="/assets/plugins/owlcarousel/owl.carousel.min.css">

    <link rel="stylesheet" href="/assets/css/style.css">


</head>

<body>

    <div id="global-loader">
        <div class="whirly-loader"></div>
    </div>
    <div class="main-wrapper">
        <?php
        try {
            require "files/header.html";
            echo '<div class="page-wrapper"></div>';
        } catch (error $e) {
            echo $e;
        }
        ?>
    </div>

    <script src="/assets/js/jquery-3.6.0.min.js"></script>

    <script src="/assets/js/feather.min.js"></script>

    <script src="/assets/js/jquery.slimscroll.min.js"></script>

    <script src="/assets/js/jquery.dataTables.min.js"></script>
    <script src="/assets/js/dataTables.bootstrap4.min.js"></script>

    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <script src="/assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="/assets/plugins/apexchart/chart-data.js"></script>

    
    <script src="/assets/plugins/select2/js/select2.min.js"></script>
    
    <script src="/assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="/assets/plugins/sweetalert/sweetalerts.min.js"></script>
    
    <script src="/assets/js/script.js"></script>

    <script src="/assets/js/functions.js"></script>

    <script src="/assets/plugins/owlcarousel/owl.carousel.min.js"></script>

    
</body>

</html>