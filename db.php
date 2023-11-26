<?php

$host = 'localhost';
$user = 'root';
$password = 'nouveau_mot_de_passe';
$database = 'sport_meet';

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

function registerUser($username, $email, $password)
{
    global $conn;

    // Vérifier si le nom d'utilisateur ou l'e-mail existe déjà
    $stmtCheck = $conn->prepare("SELECT COUNT(*) FROM user WHERE username = :username OR email = :email");
    $stmtCheck->bindParam(':username', $username);
    $stmtCheck->bindParam(':email', $email);
    $stmtCheck->execute();

    $userExists = $stmtCheck->fetchColumn();

    if ($userExists > 0) {
        return false;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmtInsert = $conn->prepare("INSERT INTO user (username, email, password) VALUES (:username, :email, :password)");
    $stmtInsert->bindParam(':username', $username);
    $stmtInsert->bindParam(':email', $email);
    $stmtInsert->bindParam(':password', $hashedPassword);

    try {
        $stmtInsert->execute();
        return true;
    } catch (PDOException $e) {
        return false;
    }
}


function loginUser($identifier, $password)
{
    global $conn;

    $stmt = $conn->prepare("SELECT id_user, username, password FROM user WHERE email = :identifier OR username = :identifier");
    $stmt->bindParam(':identifier', $identifier);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    echo $user;

    if ($user && password_verify($password, $user['password'])) {
        return $user['id_user'];
    } else {
        echo $user;
        return false;
    }
}


?>