<?php

define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_SERVER', 'localhost');
define('DB_NAME', 'demo');

// API configuration
define('API_URL', 'https://your-api-endpoint.com';)
define('API_URL', 'your_api_key');

// Database connection
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_NAME, DB_PASSWORD);

// Check Connection
if($link === false) {
    // Converting error to JSON response
    $response = [
        'status' => 'error',
        'message' => mysqli_connect_error()
    ];
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Redirect to API
    $ch= curl_init();
    curl_setopt($ch, CURLOPT_URL, API_URL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . API_KEY,
        'Content-Type: application/json'
    ]);

    $result = curl_exec($ch);
    curl_close($ch);

    // Forward API Response
    header('Content-Type: application/json')
    echo $result;
}
?>