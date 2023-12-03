<?php

session_unset();
function secondsUntilMidnight() {
    // Set session timeout to 1 hour (3600 seconds)
    ini_set('session.gc_maxlifetime', 3600);

    // Calculate remaining time until midnight
    $now = time(); // Current time in seconds since the Unix Epoch
    $midnight = strtotime('tomorrow midnight'); // Midnight of the next day

    // Set session cookie parameters for the remaining time until midnight
    $timeout = $midnight - $now;
    session_set_cookie_params($timeout);

}

if(isset($_POST["authenticate"])) {
    require("./config/db.class.php");
    require("./config/db_config.php");
    $user_name = $_POST["user_name"];
    $password = $_POST["password"];
    print_r($_POST);
    $result = DB::query("select * from user where user_name=%s and password = %s", $user_name, $password);
    print_r($result);
    if ($result) {
        $_SESSION['user'] = $user_name;
        $_SESSION["unique_id"] = md5($user_name . date('Ymd'));
        secondsUntilMidnight();
        DB::insert("user_log", ["user_id" => $result['id'], "user_name" => $user_name]);
    }
    header("Location: /");
} else if (!isset($_SESSION["user"])) {
    require("./authentication/sign_in.php");
} else {
    exit();
}

?>