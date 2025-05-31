<?php
include '../includes/auth.php';
include '../includes/db.php';

$projects = $conn->query("SELECT COUNT(*) as total FROM projects")->fetch_assoc();
$messages = $conn->query("SELECT COUNT(*) as total FROM messages")->fetch_assoc();
?>
<h2>Dashboard</h2>
<p>Projects: <?= $projects['total'] ?></p>
<p>Messages: <?= $messages['total'] ?></p>
<a href="add_project.php">Add Project</a> |
<a href="messages.php">View Messages</a> |
<a href="logout.php">Logout</a>