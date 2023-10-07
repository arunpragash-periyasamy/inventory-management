<?php
$method = $_SERVER['REQUEST_METHOD'];
$request = $_SERVER['REQUEST_URI'];
$headers = getallheaders();
$data = json_decode(file_get_contents('php://input'), true); // For JSON requests

    if($method === "POST"){
        // header('Content-Type: application/json');
        http_response_code(200);
        echo "data received";
        if(strtolower($_POST['method']) === 'insert'){
            return insert($_POST['form'], $_POST['page']);
        }
        
    }
    if($_SERVER["REQUEST_METHOD"] === "GET"){
        echo "Post request";
    }
    if($_SERVER["REQUEST_METHOD"] === "PUT"){
        echo "Post request";
    }
    if($_SERVER["REQUEST_METHOD"] === "DELETE"){
        echo "Post request";
    }
?>