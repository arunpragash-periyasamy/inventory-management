<?php
require("db.class.php");
require("db_structure.php");
// $db = new DB("localhost", "arun", "arun", "dummy", 3306,);
DB::$user = 'arun';
DB::$password = 'arun@1234';
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
    if ($_GET['file_name']) {
        $file = ".." . $_GET['file_name'];
        if (file_exists($file)) {
            $html_content = file_get_contents($file);
            if($_GET["id"]){
                $id=$_GET["id"];
                $html_content = str_replace('value="0"', 'value="' . $id . '"', $html_content);
            }
            http_response_code(200); // File exists
            header('Content-Type: text/html');
            // readfile($file);
            echo $html_content;
        }else if(preg_match('/\.(script|php|js)$/', $file)){
            echo " ";
        } 
        else {
            http_response_code(200); // File not found
            readfile("./error/error-404.php");
            echo $file;
        }
        exit();
    }
    if ($_GET['option']) {
        if ($get_table_data[$page]) {
            if($_GET['id']){
                $id = $_GET['id'];
                foreach ($get_table_data[$page]["tables"]["form_data"] as $table => $data) {
                    $fields = implode(" ,", $data["columns"]);
                    $condition = $data["where"];
                    $result = DB::query("select  * from add_category where $condition=$id");
                    $results[$data["name"]] = $result;
                    $results["query"] = "select  * from add_category where $condition=$id";
                }
            }
            foreach ($get_table_data[$page]["tables"]["options"] as $table => $data) {
                $fields = implode(" ,", $data["columns"]);
                $result = DB::query("select  $fields from $table");
                $results[$data["name"]] = $result;
            }
            print_r(json_encode($results,true));
        }
        exit();
    }
}

if ($method === "POST") {

    if ($_FILES) {
        $file_paths = upload_files($directory, $page);
        $pathIndex = 1;
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'image')) {
                $_POST[$key] = $file_paths[$pathIndex];
                $pathIndex++;
            }
        }
    }

    try {
        $form = $_POST;
        $form['created_by'] = $_SESSION['user'];
        DB::insertUpdate($page, $form);
    } catch (error $e) {
        throw $e;
    } catch (Exception $exp) {
        throw $exp;
    }
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


function upload_files($directory, $page)
{
    $uploadDir = "./upload/$directory/$page/";
    if (!file_exists($uploadDir)) {
        if (!mkdir($uploadDir, 0777, true)) {
            echo "Unable to create the directory";
        }; // Create the directory if it doesn't exist
    }

    $uploadSuccess = true; // Assume success by default
    $file_paths[] = [];
    // Loop through all uploaded files
    foreach ($_FILES as $fileField => $fileInfo) {
        if ($fileInfo['error'] !== UPLOAD_ERR_OK) {
            $errors[] = "Error uploading the file '$fileField': Error code " . $fileInfo['error'];
            $uploadSuccess = false; // Set upload success to false if any file fails to upload
            continue; // Skip the file if there's an error
        }

        $originalFileName = $fileInfo['name'];
        $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);

        // Change the file name to something unique with the original extension
        $newFileName = uniqid() . '_' . time() . '.' . $extension;
        $targetPath = $uploadDir . $newFileName;
        $file_paths[] = $targetPath;
        if (!move_uploaded_file($fileInfo['tmp_name'], $targetPath)) {
            echo "Error moving the file '$fileField' to the target directory.";
            $uploadSuccess = false; // Set upload success to false
        }
    }

    $permissions = fileperms($uploadDir);
    if (($permissions & 0x0080) !== 0x0080) {
        echo "Write permissions are not set for the target directory.";
    }

    if (!$uploadSuccess) {
        echo "unable to upload the files";
    }
    return $file_paths;
}
