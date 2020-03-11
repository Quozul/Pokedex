<!DOCTYPE html>
<html>
<?php include('includes/head.php'); ?>

<body>
    <?php include('includes/header.php'); ?>
    <main>
        <p>Ajouter un pokemon</p>
        <form action="action/add_pokemon_process.php" method="post"  enctype="multipart/form-data">
            <h1>Nom :</h1><input type="text" name="nom" placeholder="Nom"><br>
            <h1>PV :</h1><input type="text" name="pv" placeholder="PV"><br>
            <h1>Att :</h1><input type="text" name="att" placeholder="Attaque"><br>
            <h1>Def :</h1><input type="text" name="det" placeholder="Deffense"><br>
            <h1>Vit :</h1><input type="text" name="vit" placeholder="Vitesse"><br>
            <h1>Image du Pokemon :</h1><input type="file" name="image"><br>
            <input type="submit" name="submit" value="Ajouter">
        </form>
    </main>
    <?php include('includes/footer.php'); ?>
</body>

</html>