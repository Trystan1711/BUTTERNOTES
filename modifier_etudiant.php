<?php
include 'config.php';
$pdo = connexionDB();


if (isset($_GET['id'])) {
    $id_eleve = $_GET['id'];

 
    $stmt = $pdo->prepare('SELECT * FROM eleve WHERE id_eleve = ?');
    $stmt->execute([$id_eleve]);
    $eleve = $stmt->fetch();

    if (!$eleve) {
        die("Élève non trouvé.");
    }

   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        $TD = $_POST['TD'];
        $TP = $_POST['TP'];
        $formation = $_POST['formation'];
        $annee_formation = $_POST['annee_formation'];
        $identifiant = $_POST['identifiant'];

        $stmt = $pdo->prepare('UPDATE eleve SET nom = ?, prenom = ?, email = ?, mdp = ?, TD = ?, TP = ?, formation = ?, annee_formation = ?, identifiant = ? WHERE id_eleve = ?');
        $stmt->execute([$nom, $prenom, $email, $mdp, $TD, $TP, $formation, $annee_formation, $identifiant, $id_eleve]);

        header("Location: liste_eleves.php");
        exit();
    }
} else {
    die("ID de l'élève non spécifié.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Étudiant</title>
    <link href="css/compte.css" rel="stylesheet" type="text/css">
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
<div class="starter-template">
    <h1>Modifier l'Élève</h1>
    <form method="post">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($eleve['nom']) ?>" required><br><br>

        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($eleve['prenom']) ?>" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($eleve['email']) ?>" required><br><br>

        <label for="mdp">Mot de passe:</label>
        <input type="password" id="mdp" name="mdp" value="<?= htmlspecialchars($eleve['mdp']) ?>" required><br><br>

        <label for="TD">TD:</label>
        <input type="number" id="TD" name="TD" value="<?= htmlspecialchars($eleve['TD']) ?>" required><br><br>

        <label for="TP">TP:</label>
        <input type="text" id="TP" name="TP" value="<?= htmlspecialchars($eleve['TP']) ?>" required><br><br>

        <label for="formation">Formation:</label>
        <input type="text" id="formation" name="formation" value="<?= htmlspecialchars($eleve['formation']) ?>" required><br><br>

        <label for="annee_formation">Année de formation:</label>
        <input type="number" id="annee_formation" name="annee_formation" value="<?= htmlspecialchars($eleve['annee_formation']) ?>" required><br><br>

        <label for="identifiant">Identifiant:</label>
        <input type="text" id="identifiant" name="identifiant" value="<?= htmlspecialchars($eleve['identifiant']) ?>" required><br><br>

        <input type="submit" value="Enregistrer">
    </form>
</div>
</body>
</html>
