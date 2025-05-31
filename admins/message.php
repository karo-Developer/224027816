<?php
include '../includes/auth.php';
include '../includes/db.php';
$messages = $conn->query("SELECT * FROM messages ORDER BY created_at DESC");
?>
<h2>Messages</h2>
<?php while($m = $messages->fetch_assoc()): ?>
    <div style="border:1px solid #ccc; padding:10px; margin:10px;">
        <strong><?= $m['name'] ?> (<?= $m['email'] ?>)</strong><br>
        <?= $m['message'] ?><br>
        Status: <?= $m['is_read'] ? 'Read' : 'Unread' ?>
    </div>
<?php endwhile; ?>