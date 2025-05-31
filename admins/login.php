<?php
session_start();
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password_hash, role FROM admins WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($id, $hash, $role);
    if ($stmt->fetch() && password_verify($password, $hash)) {
        $_SESSION['admin_id'] = $id;
        $_SESSION['admin_role'] = $role;
        header("Location: dashboard.php");
    } else {
        echo "Invalid login.";
    }
}
?>
<form method="POST">
    <input name="username" placeholder="Username" required><br>
    <input name="password" type="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>