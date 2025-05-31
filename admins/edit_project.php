<?php
include '../includes/auth.php';
include '../includes/db.php';
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $tech = $_POST['technologies'];
    $url = $_POST['project_url'];

    $stmt = $conn->prepare("UPDATE projects SET title=?, description=?, technologies=?, project_url=? WHERE id=?");
    $stmt->bind_param("ssssi", $title, $desc, $tech, $url, $id);
    $stmt->execute();
    echo "Updated";
}

$result = $conn->query("SELECT * FROM projects WHERE id=$id");
$project = $result->fetch_assoc();
?>
<form method="POST">
    <input name="title" value="<?= $project['title'] ?>"><br>
    <textarea name="description"><?= $project['description'] ?></textarea><br>
    <input name="technologies" value="<?= $project['technologies'] ?>"><br>
    <input name="project_url" value="<?= $project['project_url'] ?>"><br>
    <button type="submit">Update</button>
</form>
