<?php
include '../includes/auth.php';
include '../includes/db.php';
$id = $_GET['id'];
$conn->query("DELETE FROM projects WHERE id=$id");
echo "Deleted.";
?>