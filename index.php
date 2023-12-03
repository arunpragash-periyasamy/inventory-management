<?php
session_start();
header("Access-Control-Allow-Origin: *"); // Allow requests from any origin
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // Specify allowed HTTP methods
header("Access-Control-Allow-Headers: Content-Type, Accept"); // Specify allowed HTTP headers
if ((!isset($_SESSION["user"]) && !isset($_SESSION['unique_id'])) || $_GET['url'] == '/sign_in') {
    require("./authentication/authenticate.php");
} else {

    if (!$_GET['file']) {
        require('./config/request_handling.php');
    }

    $headers = getallheaders();
    $url = rtrim(trim($_GET['url']), "/");
    $page_title = explode("/", $url)[2];
    $page_title = ($page_title == "") ? "dashboard" : $page_title;
    $url = ($url == "") ? "/dashboard.php" : "$url.php";


    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inventory</title>

        <!-- css links  -->
        <link rel="shortcut icon" type="image/x-icon" href="/assets/img/belgaum_plumbers/logo1.svg">
        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/css/animate.css">
        <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="/assets/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="/assets/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="/assets/plugins/fontawesome/css/fontawesome.min.css">
        <link rel="stylesheet" href="/assets/plugins/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="/assets/plugins/owlcarousel/owl.carousel.min.css">
        <link rel="stylesheet" href="/assets/plugins/owlcarousel/owl.theme.default.min.css">
        <link rel="stylesheet" href="/assets/css/style.css">
        <link rel="stylesheet" href="/assets/plugins/toastr/toatr.css">
        <script src="/assets/js/jquery-3.6.0.min.js"></script>

    </head>

    <body>

        <div id="global-loader">
            <div class="whirly-loader"></div>
        </div>
        <div class="main-wrapper">
            <?php
            try {
                require "files/header.html";
                require "files/sidebar.html";
                require ".$url";
            } catch (error $e) {
                echo $e;
            }
            ?>
        </div>

        <script src="/assets/js/feather.min.js"></script>
        <script src="/assets/js/jquery.slimscroll.min.js"></script>
        <script src="/assets/js/jquery.dataTables.min.js"></script>
        <script src="/assets/js/dataTables.bootstrap4.min.js"></script>
        <script src="/assets/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/plugins/select2/js/select2.min.js"></script>
        <script src="/assets/js/moment.min.js"></script>
        <script src="/assets/js/bootstrap-datetimepicker.min.js"></script>
        <script src="/assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
        <script src="/assets/plugins/sweetalert/sweetalerts.min.js"></script>
        <script src="/assets/plugins/owlcarousel/owl.carousel.min.js"></script>
        <script src="/assets/js/loadash.min.js"></script>
        <script src="/assets/plugins/apexchart/apexcharts.min.js"></script>
        <script src="/assets/plugins/apexchart/chart-data.js"></script>
        <script src="/assets/plugins/toastr/toastr.min.js"></script>
        <script src="/assets/js/script.js"></script>
        <script src="/functions/functions.js"></script>
    </body>
    <script>
        $(`#<?php echo $page_title ?>`).addClass("active");
        document.title = "<?php echo ucfirst(str_replace("_", " ", $page_title)) ?>";
        <?php

        $var = md5('id');
        if ($_GET[$var]) {
            $data = DB::queryFirstRow("select * from $page_title where id=%s;", $_GET[md5('id')]);
            $json = json_encode($data);
            ?>
            var data = <?php print_r($json); ?>;
            updateData(data);
            <?php

        }
        ?>
    </script>

    </html>

    <?php
}
?>