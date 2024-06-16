<?php
include 'config.php';
$pdo = connexionDB();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM enseignant WHERE id_enseignant = ?");
    $stmt->execute([$id]);

    header("Location: admin_prof.php");
    exit();
}
?>
