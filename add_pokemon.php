<!DOCTYPE html>
<html>
<?php include('includes/head.php'); ?>

<body>
    <?php include('includes/header.php'); ?>
    <main>
        <p>Ajouter un pokemon</p>
        <form action="signUpProcess.php" method="post">
            <input type="text" name="nom" placeholder="Nom"><br>
            <input type="text" name="pv" placeholder="PV"><br>
            <input type="text" name="att" placeholder="Attaque"><br>
            <input type="text" name="det" placeholder="Deffense"><br>
            <input type="text" name="vit" placeholder="Vitesse"><br>
            <input type="submit" name="submit" value="Ajouter">
        </form>
    </main>
    <?php include('includes/footer.php'); ?>
</body>

</html>