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
        <a href="profil_admin.php">Profil</a>
        <a href="admin_matieres.php">Matière</a>
        <a href="admin_prof.php">Enseignant</a>
        <a href="admin_etudiant.php">Étudiant</a>
        <a href = logout.php>Deconnexion </a>
    </nav>
</header>
<body>
<?php
include 'config.php';

$pdo = connexionDB();
$stmt = $pdo->query('SELECT * FROM eleve');
$eleves = $stmt->fetchAll();
?>

<div class="starter-template">
    <h1>Liste des Élèves</h1>
    <a href="ajouter_ressource.php" class="btn btn-primary mb-3"> Ajouter Élèves</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>id_eleve</th>  
                <th>nom</th>
                <th>prenom</th>
                <th>email</th>
                <th>mdp</th>
                <th>TD</th>
                <th>TP</th>
                <th>formation</th>
                <th>annee_formation</th>
                <th>identifiant</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eleves as $eleve): ?>
            <tr>
                <td><?= htmlspecialchars($eleve['id_eleve']) ?></td>
                <td><?= htmlspecialchars($eleve['nom']) ?></td>
                <td><?= htmlspecialchars($eleve['prenom']) ?></td>
                <td><?= htmlspecialchars($eleve['email']) ?></td>
                <td><?= htmlspecialchars($eleve['mdp']) ?></td>
                <td><?= htmlspecialchars($eleve['TD']) ?></td>
                <td><?= htmlspecialchars($eleve['TP']) ?></td>
                <td><?= htmlspecialchars($eleve['formation']) ?></td>
                <td><?= htmlspecialchars($eleve['annee_formation']) ?></td>
                <td><?= htmlspecialchars($eleve['identifiant']) ?></td>
                <td>
                    <a href="modifier_etudiant.php?id=<?= $eleve['id_eleve'] ?>" class="btn btn-sm btn-custom-modifier">
                        <i class="fas fa-edit"></i> Modifier
                    </a>
                    <a href="supprimer_etudiant.php?id=<?= $eleve['id_eleve'] ?>" class="btn btn-sm btn-custom-supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette ressource ?');">
                        <i class="fas fa-trash-alt"></i> Supprimer
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
