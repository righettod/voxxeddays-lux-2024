<?php
/* Headers and session elements (expliclty configure the session cookie in a insecure way) */
include_once "security-headers.php";
$sessionCookieOptions = [
    "cookie_secure" => false,
    "cookie_httponly" => false,
    "cookie_samesite" => "strict",
];
session_start($sessionCookieOptions);
$sessionSecretKey = "secret";
if (!isset($_SESSION[$sessionSecretKey])) {
    $sessId = session_id();
    $secretKey = sha1(uniqid() . uniqid(), false);
    $_SESSION[$sessionSecretKey] =  $secretKey;
    file_put_contents("store/secret.json", "{\"sessionId\":\"$sessId\",\"secretKey\":\"$secretKey\"}");
}
/* API processing */
$dataFile = "store/comments.json";
if (!file_exists($dataFile)) {
    file_put_contents($dataFile, "[]");
}
$data = file_get_contents($dataFile);
header("Content-Type: application/json", true, 200);
$method = $_SERVER["REQUEST_METHOD"];
if ($method === "GET") {
    echo (urldecode($data));
} elseif ($method === "POST") {
    $userName = $_POST["userName"];
    $userEmail = $_POST["userEmail"];
    $userComment = $_POST["userComment"];
    $jsonData = json_decode($data, true);
    $jsonData[] = array("userName" => urlencode($userName), "userEmail" => urlencode($userEmail), "userComment" => urlencode($userComment));
    $data = json_encode($jsonData);
    file_put_contents($dataFile, $data);
    echo ('{"status":"Review stored."}');
} else {
    echo ('{"status":"Invalid requests!"}');
}
