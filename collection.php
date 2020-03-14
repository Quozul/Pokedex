<!DOCTYPE html>
<html>
<?php include('includes/head.php'); ?>

<body>

    <?php include('includes/header.php'); ?>

    <main>
        <?php
        $request = $pdo->prepare('SELECT nom, pv, attaque, defense, vitesse, image FROM pokemon');
        $request->execute();
        $pokemons = $request->fetchAll();
        ?>
        <h1>Tous les pokemons</h1>
        <div class="pokemons">
            <?php foreach ($pokemons as $key => $pokemon) { ?>
                <article class="pokemon">
                    <img src="/uploads/<?php echo $pokemon['image']; ?>">
                    <span>
                        <strong><?php echo $pokemon['nom']; ?></strong><br>
                        PV : <?php echo $pokemon['pv']; ?><br>
                        Attaque : <?php echo $pokemon['attaque']; ?><br>
                        Défense : <?php echo $pokemon['defense']; ?><br>
                        Vitesse : <?php echo $pokemon['vitesse']; ?><br>
                    </span>
                </article>
            <?php } ?>
        </div>
    </main>

    <?php include('includes/footer.php'); ?>

</body>

</html>