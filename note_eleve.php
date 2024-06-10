<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "butternotes";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$student_id = 1;


$sql_student = "SELECT nom, prenom, TP FROM eleve WHERE id_eleve=$student_id";
$result_student = $conn->query($sql_student);
$student = $result_student->fetch_assoc();


$sql = "SELECT note, coeff, '2024-06-10' as date_epreuve FROM note 
        JOIN epreuve ON note.id_ressource = epreuve.id_ressource
        WHERE id_eleve=$student_id";
$result = $conn->query($sql);

$grades = [];
while ($row = $result->fetch_assoc()) {
    $grades[] = $row;
}


$total = 0;
$coeff_sum = 0;
foreach ($grades as $grade) {
    $total += $grade['note'] * $grade['coeff'];
    $coeff_sum += $grade['coeff'];
}
$average = $coeff_sum ? $total / $coeff_sum : 0;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Butternotes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .profile {
            width: 25%;
            float: left;
            padding: 10px;
            background: #f0f0f0;
        }
        .grades {
            width: 50%;
            float: left;
            padding: 10px;
        }
        .summary {
            width: 25%;
            float: left;
            padding: 10px;
            background: #f0f0f0;
        }
        .grade-list {
            list-style-type: none;
            padding: 0;
        }
        .grade-item {
            padding: 5px;
            border-bottom: 1px solid #ccc;
        }
        .average {
            font-size: 2em;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="profile">
        <h2>Profil Élève</h2>
        <p><strong>Nom:</strong> <?php echo htmlspecialchars($student['nom']); ?></p>
        <p><strong>Prénom:</strong> <?php echo htmlspecialchars($student['prenom']); ?></p>
        <p><strong>TP:</strong> <?php echo htmlspecialchars($student['TP']); ?></p>
    </div>
    <div class="grades">
        <h2>Notes</h2>
        <ul class="grade-list">
            <?php foreach ($grades as $grade): ?>
                <li class="grade-item">
                    <span><?php echo date("d/m", strtotime($grade['date_epreuve'])); ?>: </span>
                    <span><?php echo htmlspecialchars($grade['note']); ?>/20</span>
                    <span> (Coeff <?php echo htmlspecialchars($grade['coeff']); ?>)</span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="summary">
        <h2>Moyenne</h2>
        <p class="average"><?php echo number_format($average, 2); ?>/20</p>
        <div id="chart" style="width:100%; height:200px;"></div>
    </div>

    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Date', 'Note'],
                <?php foreach ($grades as $grade): ?>
                    ['<?php echo date("d/m", strtotime($grade['date_epreuve'])); ?>', <?php echo $grade['note']; ?>],
                <?php endforeach; ?>
            ]);

            var options = {
                title: 'Grades',
                hAxis: {title: 'Date'},
                vAxis: {title: 'Note'},
                legend: 'none'
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('chart'));
            chart.draw(data, options);
        }
    </script>
</body>
</html>

<?php
$conn->close();
?>
