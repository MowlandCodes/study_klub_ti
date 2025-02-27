<?php

require_once "session.php";

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // validate if email if empty
    if (empty($email)) {
        $error .= '<p class="error">Please Enter Email. </p>';
    }

    // validate if password is empty
    if (empty($password)) {
        $error .= '<p class="error">Please Enter Password. </p>';
    }

    if (empty($error)) {
        // API Endpoint
        $apiurl = 'https://api-yang-dipakai.com/api/login';

        // Prepaing the data for API
        $postData = array(
            'email' => $email,
            'password' => $password
        );

        // Initialize cURL session
        $ch = curl_init($apiurl);

        // set cURL options
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept: application/json'
        ));

        // Execute the request
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLOPT_HTTP_CODE);

        // Close cURL session
        curl_close($ch);

        // Parse the Response
        $result = json_decode($response, true);

        if ($httpCode === 200) {
            if ($result['success']) {
                // Store user data in session
                $_SESSION['userid'] = $result['user']['id'];
                $_SESSION['user'] = $result['user'];

                // Redirect the user to welcome page
                header("location: welcome.php");
                exit;
            } else {
                $error .= '<p class="error">' . $result['massage'] . '</p>';
            }
        } else {
            $error .= '<p class="error" Authentication Failed. Please Try Again.</p>'
        }
    }
}