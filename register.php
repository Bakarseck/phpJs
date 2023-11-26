<?php include('./template/navbar.php'); ?>

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
