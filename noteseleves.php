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
        <a href="profil_eleve.php">Profil</a>
        <a href="noteseleves.php">Notes</a>
        <a href = logout.php>Deconnexion </a>
    </nav>
</header>
<body>
<?php
include 'config.php';

$pdo = connexionDB();
$stmt = $pdo->query('SELECT * FROM note');
$note = $stmt->fetchAll();
?>

<div class="starter-template">
    <h1>Liste des Notes</h1>
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
                    
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
