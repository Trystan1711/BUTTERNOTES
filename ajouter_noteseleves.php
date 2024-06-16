<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/admin.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>
<header>
    <nav>
        <a href="profil_enseignant.php">Profil</a>
        <a href="ajouter_noteseleves.php">Ajouter Des Notes</a>
        <a href = logout.php>Deconnexion </a>
        
    </nav>
</header>


<?php
include 'config.php';

$pdo = connexionDB();
$stmt = $pdo->query('SELECT * FROM note');
$note = $stmt->fetchAll();
?>

<div class="starter-template">
    <h1>Liste des Notes</h1>
    <a href="ajouter_note.php" class="btn btn-primary mb-3">Ajouter une Note</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>id_note</th>
                <th>note</th>
                <th>id_eleve</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($note as $note): ?>
            <tr>
                <td><?= htmlspecialchars($note['id_note']) ?></td>
                <td><?= htmlspecialchars($note['note']) ?></td>
                <td><?= htmlspecialchars($note['id_eleve']) ?></td>
            
                <td>
                    <a href="modifier_note.php?id=<?= $note['id_note'] ?>" class="btn btn-sm btn-custom-modifier">
                        <i class="fas fa-edit"></i> Modifier
                    </a>
                    <a href="supprimer_note.php?id=<?= $note['id_note'] ?>" class="btn btn-sm btn-custom-supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette note ?');">
                        <i class="fas fa-trash-alt"></i> Supprimer
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
