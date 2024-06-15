<?php
include 'config.php';
$pdo = connexionDB();

// Vérifier si l'ID de l'élève est passé en paramètre
if (isset($_GET['id'])) {
    $id_eleve = $_GET['id'];

    // Supprimer l'élève de la base de données
    $stmt = $pdo->prepare('DELETE FROM eleve WHERE id_eleve = ?');
    $stmt->execute([$id_eleve]);

    header("Location: liste_eleves.php");
    exit();
} else {
    die("ID de l'élève non spécifié.");
}
?>
