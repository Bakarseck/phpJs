<?php include('./template/navbar.php'); ?>

<?php

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['password'];

    $userId = loginUser($identifier, $password);

    if ($userId) {
        header('Location: /');
        exit();
    } else {
    }
}

?>



<div class="content">
    <h2>Connexion</h2>
    <form action="login.php" method="post">
        <label for="email">Adresse e-mail :</label>
        <input type="email" name="email" required><br>
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" required><br>
        <input type="submit" value="Se Connecter">
    </form>
</div>

<?php include('./template/footer.php'); ?>