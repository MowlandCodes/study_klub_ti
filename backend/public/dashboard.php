<?php

// dashboard yang mengambil data dari API
include '../src/session.php';
require '../src/config.php';

// Panggil API
$api_url = API_URL . "forum.php";
$response = file_get_contents($api_url);
$forums = json_decode($response, true);

?>

<h1>Forum Diskusi</h1>
<ul>
    <?php foreach ($forums as $forum): ?>
        <li><?php echo htmlspecialchars($forum['title']); ?> </li>
    <?php endforeach; ?>
</ul>
<a href="logout.php">Log Out</a>