<?php include('base.php'); ?>

<div class="navbar">
    <a href="index.php">Accueil</a>

    <?php
    session_start();

    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
        $username = $_SESSION['username'];

        echo '<span>Bonjour, ' . $username . '!</span>';
        echo '<a href="logout.php">Déconnexion</a>';
    } else {
        echo '<a href="register.php">S\'inscrire</a>';
        echo '<a href="login.php">Se connecter</a>';
    }
    ?>
</div>