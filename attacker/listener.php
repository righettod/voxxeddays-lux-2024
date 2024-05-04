<?php

/* Simple listener storing every data received */
$dataFile = "store/data.txt";
$dataKey = "data";
$msg = "NO";
if (isset($_POST[$dataKey])) {
    $data = $_POST[$dataKey] . "\n--------\n";
    file_put_contents($dataFile, $data, FILE_APPEND);
    $msg = "YES";
}
header("Location: http://righettod.local:8000?dataCapturedByAttacker=$msg", true, 302);
