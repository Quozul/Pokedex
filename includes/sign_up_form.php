<form action="actions/verif_inscription.php" method="post" enctype="multipart/form-data">
    <h2>Inscription</h2>
    <input type="email" placeholder="Adresse e-mail" name="email">
    <input type="text" placeholder="Pseudonyme" name="username">
    <input type="password" placeholder="Mot de passe" name="password">
    <input type="password" placeholder="Confirmation du mot de passe" name="confirm-password">
    <input type="file" name="image">
    <input type="submit" value="S'inscrire">
</form>