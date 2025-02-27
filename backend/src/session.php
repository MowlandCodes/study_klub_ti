<?php
// Sessio untuk mengecek halaman yang perlu login.
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php?redirect=" . urlencode($_SERVER['REQUEST_URL']));
    exit();
};

// Session Timeout Check
$timeout = 1800;
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout) {
    session_unset();
    session_destroy();
    header("Location: login.php?msg=session_expired");
    exit();
}
$_SESSION['last_activity'] = time();
?>