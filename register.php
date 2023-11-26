<?php include('./template/navbar.php'); ?>

<?php

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (registerUser($username, $email, $password)) {
        
        $userId = loginUser($email, $password);
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;

        setcookie('username', $username, time() + 3600, '/');
        setcookie('email', $email, time() + 3600, '/');

        header('Location: /');
        exit();
    } else {
        echo 'L\'inscription a échoué.';
    }
}

?>


<div class="content">
    <h2>Inscription</h2>
    <form action="register.php" method="post">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" name="username" required><br>
        <label for="email">Adresse e-mail :</label>
        <input type="email" name="email" required><br>
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" required><br>
        <input type="submit" value="S'inscrire">
    </form>
</div>

<?php include('./template/footer.php'); ?>