<?php 
function connexionDB(){
    $host = "mysql-butternotes17.alwaysdata.net";
    $dbname = "butternotes17_labase";
    $user ="363221";
    $pass ="AppBouty";

    try {
    
        $pdo = new PDO('mysql:host='. $host . ';dbname='. $dbname .';charset=utf8', $user, $pass);
       
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $pdo;
     }
    catch(PDOException $e) {
        echo "Erreur : ".$e -> getMessage()."<br/>";
}
}
?>
