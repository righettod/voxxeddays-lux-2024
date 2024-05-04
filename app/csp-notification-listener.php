<?php

/* Handle the reception and storage of CSP violation notifications */
$method = $_SERVER["REQUEST_METHOD"];
if ($method === "POST") {
    $dataFile = "store/violations.json";
    if (!file_exists($dataFile)) {
        file_put_contents($dataFile, "[]");
    }
    $data = file_get_contents($dataFile);
    $violation = file_get_contents("php://input");
    $jsonData = json_decode($data, true);
    $jsonViolation = json_decode($violation, true);
    $jsonData[] = $jsonViolation;
    $data = json_encode($jsonData);
    file_put_contents($dataFile, $data);
    header("Content-Type: text/plain", true, 200);
    echo ("Stored.");
} else {
    header("Content-Type: text/plain", true, 400);
    echo ("Not stored.");
}
