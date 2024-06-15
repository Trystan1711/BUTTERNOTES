<?php
include 'config.php';
$pdo = connexionDB();

if (isset($_POST['submit'])) {
    $id = $_POST['id_enseignant'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $matiere = $_POST['matiere'];
    $ue = $_POST['ue'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $identifiant = $_POST['identifiant'];

    $stmt = $pdo->prepare("UPDATE enseignant SET prenom = ?, nom = ?, matiere = ?, ue = ?, email = ?, mdp = ?, identifiant = ? WHERE id_enseignant = ?");
    $stmt->execute([$prenom, $nom, $matiere, $ue, $email, $mdp, $identifiant, $id]);

    header("Location: admin_prof.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM enseignant WHERE id_enseignant = ?");
    $stmt->execute([$id]);
    $enseignant = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/pour.css" rel="stylesheet">
    <title>Modifier Enseignant</title>
</head>
<body>
<div class="starter-template">
    <h1>Modifier Enseignant</h1>
    <form method="post" action="modifier_enseignant.php">
        <input type="hidden" name="id_enseignant" value="<?= htmlspecialchars($enseignant['id_enseignant']) ?>">
        <div class="form-group">
            <label for="prenom">Prénom:</label>
            <input type="text" name="prenom" value="<?= htmlspecialchars($enseignant['prenom']) ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" name="nom" value="<?= htmlspecialchars($enseignant['nom']) ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="matiere">Matière:</label>
            <input type="text" name="matiere" value="<?= htmlspecialchars($enseignant['matiere']) ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="ue">UE:</label>
            <input type="text" name="ue" value="<?= htmlspecialchars($enseignant['ue']) ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" value="<?= htmlspecialchars($enseignant['email']) ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="mdp">Mot de passe:</label>
            <input type="password" name="mdp" value="<?= htmlspecialchars($enseignant['mdp']) ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="identifiant">Identifiant:</label>
            <input type="text" name="identifiant" value="<?= htmlspecialchars($enseignant['identifiant']) ?>" class="form-control" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>
</body>
</html>
