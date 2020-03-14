<!DOCTYPE html>
<html>
<?php include('includes/head.php'); ?>

<body>

    <?php
    include('includes/header.php');

    $request = $pdo->prepare('SELECT pseudo, email, image FROM user WHERE id = ?');
    $request->execute([$_SESSION['user_id']]);
    $user = $request->fetch();

    $request = $pdo->prepare('SELECT nom, pv, attaque, defense, vitesse, image FROM pokemon WHERE id_user = ?');
    $request->execute([$_SESSION['user_id']]);
    $pokemons = $request->fetchAll();
    ?>

    <main>
        <h1>Mon compte</h1>

        <h2>Mes infos</h2>
        <h3>Pseudo : <small><?php echo $user['pseudo']; ?></small></h3>
        <h3>Email : <small><?php echo $user['email']; ?></small></h3>
        <h3>Image de profil : <img class="profile-image" src="/uploads/<?php echo $user['image']; ?>"></h3>

        <hr>

        <h2>Mes pokemons</h2>
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