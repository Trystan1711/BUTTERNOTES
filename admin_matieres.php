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
        <a href="admin_etudiant.php">Etudiant</a>
        <a href = logout.php>Deconnexion </a>
    </nav>
</header>
<body>
    <?php
    include 'config.php';
    $pdo = connexionDB();
    $stmt = $pdo->query('SELECT * FROM ressources');
    $ressources = $stmt->fetchAll();
    ?>
    <div class="starter-template">
        <h1>Liste des Ressources</h1>
        <a href="ajouter_ressource.php" class="btn btn-primary mb-3">Ajouter une Ressource</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>id_ressource</th>
                    <th>matiere</th>
                    <th>id_ue</th>
                    <th>id_enseignant</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ressources as $ressource): ?>
                <tr>
                    <td><?= htmlspecialchars($ressource['id_ressource']) ?></td>
                    <td><?= htmlspecialchars($ressource['matiere']) ?></td>
                    <td><?= htmlspecialchars($ressource['id_ue']) ?></td>
                    <td><?= htmlspecialchars($ressource['id_enseignant']) ?></td>
                    <td>
                        <a href="modifier_ressource.php?id=<?= $ressource['id_ressource'] ?>" class="btn btn-sm btn-custom-modifier">
                            <i class="fas fa-edit"></i> Modifier
                        </a>
                        <a href="supprimer_ressource.php?id=<?= $ressource['id_ressource'] ?>" class="btn btn-sm btn-custom-supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette ressource ?');">
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
