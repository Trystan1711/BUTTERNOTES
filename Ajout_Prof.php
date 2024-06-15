<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdo = connexionDB();
    $requete = 'INSERT INTO Eleves (nom, Prenoms, Matière,  ) VALUES (:nom, :Prenoms, :Matière, )'; // Utilisation de paramètres nommés dans la requête
    $stmt = $pdo->prepare($requete);
    
    // Lier les paramètres
    $stmt->bindParam(':nom', $_POST['nom']);
    $stmt->bindParam(':Prenoms', $_POST['Prenoms']);
    $stmt->bindParam(':Matière', $_POST['Matière']);
    
    
    
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
    <title>Ajouter un Prof</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="starter-template">
        <h1>Ajouter un Prof</h1>
        <form method="post" action="ajouter_candidat.php">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="Prenoms">Prénoms</label>
                <input type="text" class="form-control" id="Prenoms" name="Prenoms" required>
            </div>
            <div class="form-group">
                <label for="Groupe">Matière</label>
                <input type="text" class="form-control" id="Groupe" name="Groupe" required>
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