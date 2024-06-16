<?php
// Connexion à la base de données
$servername = "mysql-butternotes17.alwaysdata.net";
$identifiant = "363221";
$mdp = "AppBouty";
$dbname = "butternotes17_labase";

// Créer la connexion
$conn = new mysqli($servername, $identifiant, $mdp, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Vérifier les identifiants de connexion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifiant = $_POST['identifiant'];
    $mdp = $_POST['mdp'];
    $role = $_POST['role'];

    if ($role == "admin") {
        $sql = "SELECT * FROM administrateur WHERE identifiant = '$identifiant' AND mdp = '$mdp'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // Redirection vers le profil admin
            header("Location: profil_admin.php");
            exit();
        }
    } else if ($role == "eleve") {
        $sql = "SELECT * FROM eleve WHERE identifiant = '$identifiant' AND mdp = '$mdp'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // Redirection vers le profil élève
            header("Location: profil_eleve.php");
            exit();
        }
    } else if ($role == "enseignant") {
        $sql = "SELECT * FROM enseignant WHERE identifiant = '$identifiant' AND mdp = '$mdp'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // Redirection vers le profil élève
            header("Location: profil_enseignant.php");
            exit();
        }
    }

    // Si les identifiants sont incorrects
    echo "Identifiants incorrects.";
}

$conn->close();
?>

<!-- Formulaire de connexion -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page de connexion</title>
    <link href="css/par.css" rel="stylesheet" type="text/css">
</head>
<body>
    <header>Butternotes</header>
    <form method="post" action="index.php">
        <label for="identifiant">Identifiant:</label>
        <input type="text" id="identifiant" name="identifiant" required><br><br>
        <label for="mdp">Mot de passe:</label>
        <input type="password" id="mdp" name="mdp" required><br><br>
        <label for="role">Rôle:</label>
        <select id="role" name="role">
            <option value="admin">Admin</option>
            <option value="eleve">Etudiant</option>
            <option value="enseignant">Enseignant</option>
        </select><br><br>
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>
