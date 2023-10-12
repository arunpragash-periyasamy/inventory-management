<?php
$method = $_SERVER['REQUEST_METHOD'];
$request = $_SERVER['REQUEST_URI'];
$headers = getallheaders();
$data = json_decode(file_get_contents('php://input'), true); // For JSON requests

    if($method === "POST"){
        echo "POST method";
        return;
    }
    // if($_SERVER["REQUEST_METHOD"] === "GET"){
    //     echo "Post request";
    // }
    // if($_SERVER["REQUEST_METHOD"] === "PUT"){
    //     echo "Post request";
    // }
    // if($_SERVER["REQUEST_METHOD"] === "DELETE"){
    //     echo "Post request";
    // }
    
?>