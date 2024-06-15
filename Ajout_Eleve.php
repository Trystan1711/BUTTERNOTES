<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdo = connexionDB();
    $requete = 'INSERT INTO Eleves (nom, Prenoms, Groupe, Année, ) VALUES (:nom, :Prenoms, :Groupe, :Année, )'; // Utilisation de paramètres nommés dans la requête
    $stmt = $pdo->prepare($requete);
    
    // Lier les paramètres
    $stmt->bindParam(':nom', $_POST['nom']);
    $stmt->bindParam(':Prenoms', $_POST['Prenoms']);
    $stmt->bindParam(':Groupe', $_POST['Groupe']);
    $stmt->bindParam(':Année', $_POST['Année']);
    
    
    // Exécuter la requête
    $stmt->execute();
    
    // Rediriger vers la liste des candidats
    header('Location: candidats.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter un Eleve</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="starter-template">
        <h1>Ajouter un Eleve</h1>
        <form method="post" action="ajouter_candidat.php">
            <div class="form-group">
                <label for="ID">ID</label>
                <input type="text" class="form-control" id="ID" name="ID" required>
            </div>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="Prenoms">Prénoms</label>
                <input type="text" class="form-control" id="Prenoms" name="Prenoms" required>
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="mdp">MDP</label>
                <input type="text" class="form-control" id="mdp" name="mdp" required>
            </div>
            <div class="form-group">
                <label for="TD">TD</label>
                <input type="text" class="form-control" id="TD" name="TD" required>
            </div>
            <div class="form-group">
                <label for="TP">TP</label>
                <input type="text" class="form-control" id="TP" name="TP" required>
            </div>
            <div class="form-group">
                <label for="Formation">Formation</label>
                <input type="text" class="form-control" id="Formation" name="Formation" required>
            </div>
            <div class="form-group">
                <label for="Année">Année</label>
                <input type="number" class="form-control" id="Année" name="Année" min 1 max 3 required>
            </div>
            <div class="form-group">
                <label for="Identifiant">Identifiant</label>
                <input type="text" class="form-control" id="Identifiant" name="Identifiant" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
            <a href="candidats.php" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>