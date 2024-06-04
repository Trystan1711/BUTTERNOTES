<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/connexion.css" rel="stylesheet" type="text/css">
    <title>ButterNotes - Votre répértoires de notes</title>
</head>


</header>
<body>
    <center><form action="form.php" method="POST">
        <label for="login">Login:</label><br>
            <input type="text" id="login" name="login"><br>
            <label for="password">Mot de passe:</label><br>
       
            <input type="password" id="password" name="password"><br><br> 
            <button class="button" ><span><a class="bouton_connexion" href="compte.php">Connexion</a></span></button>
            <select name="role" id="role-choix"><br>
  <option value="">Choisir</option>
  <option value="prof">enseignant </option>
  <option value="admin">admin</option>
  <option value="eleve">etudiant</option>
            
       
        
        
        </center> 
</body>
</html>
