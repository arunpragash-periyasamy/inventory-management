<?php

require("db.class.php");
// $db = new DB("localhost", "arun", "arun", "dummy", 3306,);
DB::$user = 'arun';
DB::$password = 'arun';
DB::$dbName = 'dummy';
DB::$encoding = 'utf8';


$method = $_SERVER['REQUEST_METHOD'];
$request = $_SERVER['REQUEST_URI'];
$headers = getallheaders();
$url = parse_url($headers['Referer']); // $url = "http::/inventory.arunpragash.com/product/add_product"
$path = isset($url['path']) ? $url['path'] : ''; // $path = "/product/add_product"
$path = explode("/", $path); // $path = ["","product","add_product"]
$directory = $path[1];
$page = $path[2];

if ($method === "GET") {
    // file request handling
    if ($_GET['file']) {
        $file = "." . $_GET['file'];
        if (file_exists($file)) {
            http_response_code(200); // File exists
            header('Content-Type: text/html');
            readfile($file);
        } else {
            http_response_code(200); // File not found
            readfile("./error/error-404.php");
            echo $file;
        }
        exit();
    }
}

if ($method === "POST") {
    if ($_POST['form']) {
        try {
            $form = $_POST['form'];
            $method = $_POST['method'];
            $page = $_POST['page'];
            print_r($_POST);
            try {
                if (strtolower($method) == "insert") {
                    DB::insert($page, $form);
                    echo "inserted";
                } else if (strtolower($method) == "update") {
                    DB::update($page, $form, $condition);
                    echo "updated";
                } else if (strtolower($method) == "insertignore") {
                    DB::insertIgnore($page, $form);
                    echo "insert and ignored";
                } else if (strtolower($method) == "replace") {
                    DB::replace($page, $form);
                    echo "replaced";
                } else if (strtolower($method) == "insertupdate") {
                    DB::insertUpdate($page, $form);
                    echo "insert and updated";
                } else if (strtolower($method) == "delete") {
                    DB::delete($page, $condition);
                    echo "deleted";
                } else {
                    echo "error";
                }
            } catch (error $e) {
                echo "Inserting Error " . $e;
            }
            // $data = DB::query(`SELECT * FROM fet_04 where name=%s","Arunpragash Annanperiasamy`);
            // print_r($data);
        } catch (error $e) {
            echo $e;
        }
        echo "form_data";
    }
    echo "POST request";
    exit();
}

if ($method === 'DELETE') {
    parse_str(file_get_contents('php://input'), $condition);
    DB::delete(sprintf($page), $condition);
    echo "Data deleted";
    exit();
}

if ($method === 'PUT') {
    parse_str(file_get_contents('php://input'), $data);
    // DB::query("DELETE FROM add_catergory where id=1");
    DB::update($page, $data, $data['id']);
    exit();
}
