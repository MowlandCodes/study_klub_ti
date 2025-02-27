<?php

// Halaman Login yang menghubungkan frontend ke API
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require '../src/config.php';

    $email = $_POST["email"];
    $password = $_POST["password"];

    $api_url = API_URL . "auth.php";

    // Kirim Request ke API
    $data = json_encode(['email' => $email, 'password' => $password]);
    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_RETURTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

    $response = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($response, true);

    // Mengecek kebenaran password dan email.
    if ($result && isset($result["user_id"])) {
        $_SESSION["user_id"] = $result["user_id"];
        $_SESSION["email"] = $email;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Login Gagal!";
    }
}
?>
<form method="POST">
    Email: <input type="email" name="email">
    Password: <input type="password" name="password">
    <button type="submit">login</button>
</form>