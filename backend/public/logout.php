<?php
// Log Out PHP
session_start();
session_abort();
header("Location: login.php");
exit();

// jangan lupa nambahin tombol logout di dashboard
// <a href="logout.php">Log Out</a>
?>