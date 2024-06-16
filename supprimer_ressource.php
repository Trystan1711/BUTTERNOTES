<?php
include 'config.php';
$pdo = connexionDB();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM ressources WHERE id_ressource = ?");
    $stmt->execute([$id]);

    header('Location: admin_matieres.php');
    exit;
} else {
    die('ID de la ressource manquant.');
}
?>
