<!DOCTYPE html>
<html>
<?php include('includes/head.php'); ?>

<body>

    <?php include('includes/header.php'); ?>

    <main>
        <?php if (isset($_GET['msg'])) echo "<h2>" . $_GET['msg'] . "</h2>"; ?>

        <form method="post" action="/actions/verif_pokemon.php" enctype="multipart/form-data">
            <input type="text" placeholder="Nom" name="name">
            <input type="number" placeholder="PV" name="hp">
            <input type="number" placeholder="Attaque" name="attack">
            <input type="number" placeholder="Défence" name="defence">
            <input type="number" placeholder="Vitesse" name="speed">
            Image : <input type="file" name="image">
            <input type="submit" value="Ajouter">
        </form>
    </main>

    <?php include('includes/footer.php'); ?>

</body>

</html>