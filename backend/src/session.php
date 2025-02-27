<?php
// Sessio untuk mengecek halaman yang perlu login.
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
};

?>