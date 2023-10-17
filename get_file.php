<?php
$file = ".".$_GET['file'];

if (file_exists($file)) {
    http_response_code(200); // File exists
    header('Content-Type: text/html');
    readfile($file);
    echo "welcome";
} else {
    http_response_code(200); // File not found
    readfile("./error/error-404.php");
    echo $file;
}
?>
