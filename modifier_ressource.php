<?php
include 'config.php';
$pdo = connexionDB();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM ressources WHERE id_ressource = ?");
    $stmt->execute([$id]);
    $ressource = $stmt->fetch();

    if (!$ressource) {
        die('La ressource n\'existe pas.');
    }
} else {
    die('ID de la ressource manquant.');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $matiere = $_POST['matiere'];
    $id_ue = $_POST['id_ue'];
    $id_enseignant = $_POST['id_enseignant'];

    $stmt = $pdo->prepare("UPDATE ressources SET matiere = ?, id_ue = ?, id_enseignant = ? WHERE id_ressource = ?");
    $stmt->execute([$matiere, $id_ue, $id_enseignant, $id]);

    header('Location: admin_matieres.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/compte.css" rel="stylesheet" type="text/css">
    <title>Modifier Ressource</title>
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
    <div class="container">
        <h1>Modifier Ressource</h1>
        <form method="post">
            <div>
                <label>Matière:</label>
                <input type="text" name="matiere" value="<?= htmlspecialchars($ressource['matiere']) ?>" required>
            </div>
            <div>
                <label>ID UE:</label>
                <input type="number" name="id_ue" value="<?= htmlspecialchars($ressource['id_ue']) ?>" required>
            </div>
            <div>
                <label>ID Enseignant:</label>
                <input type="number" name="id_enseignant" value="<?= htmlspecialchars($ressource['id_enseignant']) ?>" required>
            </div>
            <button type="submit">Modifier</button>
        </form>
    </div>
</body>
</html>
