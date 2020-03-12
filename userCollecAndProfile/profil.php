<!DOCTYPE html>
<html>
<?php include('../includes/head.php'); ?>

<body>
    <?php include('../includes/header.php'); ?>
    <main>
        <h1>Mon Compte</h1>
        <br>
        <h2>Mes infos</h2>
        <?php if (!empty($_SESSION['userid'])) {
            $sth = $pdo->prepare('SELECT avatar, username, email, location, prefered_language, bio FROM users WHERE id_u=?');
            $sth->execute([$_SESSION['userid']]);
            $result = $sth->fetch();
        ?>

            <p>Pseudo : <?php echo htmlspecialchars($result['pseudo']); ?><br>
                Email : <?php echo htmlspecialchars($result['email']); ?><br>
                Image de profil : <?php echo htmlspecialchars($result['image']); ?></p>
        <?php } ?>

    </main>
    <?php include('../includes/footer.php'); ?>
</body>

</html>