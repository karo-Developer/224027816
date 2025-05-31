<?php
include '../includes/auth.php';
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $tech = $_POST['technologies'];
    $url = $_POST['project_url'];
    $img = '';

    if ($_FILES['image']['name']) {
        $img = 'uploads/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], '../' . $img);
    }

    $stmt = $conn->prepare("INSERT INTO projects (title, description, image_path, technologies, project_url) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $title, $desc, $img, $tech, $url);
    $stmt->execute();
    echo "Project added.";
}
?>

<form method="POST" enctype="multipart/form-data">
    <input name="title" required placeholder="Title"><br>
    <textarea name="description" required placeholder="Description"></textarea><br>
    <input type="file" name="image" required><br>
    <input name="technologies" required placeholder="Technologies"><br>
    <input name="project_url" placeholder="Project URL"><br>
    <button type="submit">Add Project</button>
</form>