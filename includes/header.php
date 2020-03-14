<header>
    <nav>
        <ul id="menu">
            <?php if (!isset($_SESSION['user_id'])) { ?>
                <li><a href="/connexion.php">Connexion</a></li>
            <?php } else { ?>
                <li><a href="/actions/sign_out_process.php">Déconnexion</a></li>
                <li><a href="/add_pokemon.php">Ajouter un Pokemon</a></li>
                <li><a href="/profile.php">Mon compte</a></li>
            <?php } ?>
            <li><a href="/collection.php">Collection</a></li>
            <li><a href="/">Accueil</a></li>
            <li id="logo"><a href="/"><img src="/assets/logo.png"></a></li>
        </ul>
    </nav>
</header>