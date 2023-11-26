<?php
// config.php
$db_host = "localhost";
$db_user = "root";
$db_password = "nouveau_mot_de_passe";
$db_name = "sport_meet";

$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if (!$conn) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}
?>
