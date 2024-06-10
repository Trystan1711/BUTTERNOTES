<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Élève - Butternotes</title>
    <style>
     
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f4f4f4;
        }
        header {
            width: 100%;
            background-color: #fff;
            display: flex;
            justify-content: space-between;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .logo {
            display: flex;
            align-items: center;
        }
        .container {
            display: flex;
            width: 80%;
            margin-top: 20px;
        }
        .profile-sidebar {
            width: 25%;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 20px;
            text-align: center;
        }
        .profile-sidebar h2 {
            margin-top: 10px;
        }
        .profile-sidebar p {
            margin: 5px 0;
        }
        .content {
            width: 75%;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .card {
            width: 30%;
            height: 150px;
            background-color: #e0e0e0;
            margin: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            text-decoration: none;
            color: black;
            font-size: 20px;
            text-align: center;
        }
        .card:hover {
            background-color: #d4d4d4;
        }
        footer {
            margin-top: 20px;
            text-align: center;
            padding: 10px;
            background-color: #fff;
            width: 100%;
            box-shadow: 0 -2px 4px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <span>Butternotes</span>
        </div>
        <div class="logo">
            <span>Université Gustave Eiffel</span>
        </div>
    </header>
    
        
</body>
</html>
<?php

$conn = new mysqli("localhost", "root", "", "butternotes");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$student_id = 1;


$student_query = "SELECT * FROM eleve WHERE id_eleve = $student_id";
$student_result = $conn->query($student_query);
$student = $student_result->fetch_assoc();


$subjects_query = "SELECT DISTINCT ressources.matiere, ressources.id_ressource
                   FROM note 
                   JOIN epreuve ON note.id_ressource = epreuve.id_ressource 
                   JOIN ressources ON epreuve.id_ressource = ressources.id_ressource
                   WHERE note.id_eleve = $student_id";
$subjects_result = $conn->query($subjects_query);

if (!$subjects_result) {
    die("Query failed: " . $conn->error);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  
</head>
<body>
    <header>
        
    </header>
    <div class="container">
        <div class="profile-sidebar">
            <h2 id="student-name"><?php echo $student['nom']; ?></h2>
            <p id="student-prenom"><?php echo $student['prenom']; ?></p>
            <p id="student-tp"><?php echo $student['TP']; ?></p>
        </div>
        <div class="content" id="subject-cards">
            <?php
            while ($row = $subjects_result->fetch_assoc()) {
                echo '<a href="note_eleve.php?id_ressource=' . $row['id_ressource'] . '" class="card">' . $row['matiere'] . '</a>';
            }
            ?>
        </div>
    </div>
    <footer>
        &copy; Butternotes
    </footer>
</body>
</html>
