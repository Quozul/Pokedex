<header>
    <?php

    include('config.php');

    if (isset($_SESSION['userid'])) {
        $sth = $pdo->prepare('SELECT pseudo FROM user WHERE id = ? ');

        $sth->execute([$_SESSION['userid']]);

        $rec = $sth->fetch();
    }
    ?>
    <a>Pokedex</a>
    <nav>
        <ul>
            <li>Acceuil</li>
            <li>Collection</li>
            <li>Connexion/déconnexion</li>
            <li>Ajouter un Pokemon</li>
            <li>Mon compte</li>
        </ul>
    </nav>
</header>