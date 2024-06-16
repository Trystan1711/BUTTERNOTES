<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/admin.css" rel="stylesheet" type="text/css">
    <title>Liste des Enseignants</title>
</head>
<body>
<header>
    <nav>
        <a href="profil_admin.php">Profil</a>
        <a href="admin_matieres.php">Matière</a>
        <a href="admin_prof.php">Enseignant</a>
        <a href="admin_etudiant.php">Etudiant</a>
        <a href = logout.php>Deconnexion </a>
    </nav>
</header>

<div class="starter-template">
    <h1>Liste des Enseignants</h1>
    <a href="ajouter_enseignant.php" class="btn btn-primary mb-3">Ajouter Enseignant</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>id_enseignant</th>
                <th>prenom</th>
                <th>nom</th>
                <th>matiere</th>
                <th>ue</th>
                <th>email</th>
                <th>mdp</th>
                <th>identifiant</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'config.php';
            $pdo = connexionDB();
            $stmt = $pdo->query('SELECT * FROM enseignant');
            $enseignants = $stmt->fetchAll();
            foreach ($enseignants as $enseignant):
            ?>
            <tr>
                <td><?= htmlspecialchars($enseignant['id_enseignant']) ?></td>
                <td><?= htmlspecialchars($enseignant['prenom']) ?></td>
                <td><?= htmlspecialchars($enseignant['nom']) ?></td>
                <td><?= htmlspecialchars($enseignant['matiere']) ?></td>
                <td><?= htmlspecialchars($enseignant['ue']) ?></td>
                <td><?= htmlspecialchars($enseignant['email']) ?></td>
                <td><?= htmlspecialchars($enseignant['mdp']) ?></td>
                <td><?= htmlspecialchars($enseignant['identifiant']) ?></td>
                <td>
                    <a href="modifier_enseignant.php?id=<?= $enseignant['id_enseignant'] ?>" class="btn btn-sm btn-custom-modifier">
                        <i class="fas fa-edit"></i> Modifier
                    </a>
                    <a href="supprimer_enseignant.php?id=<?= $enseignant['id_enseignant'] ?>" class="btn btn-sm btn-custom-supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet enseignant ?');">
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
