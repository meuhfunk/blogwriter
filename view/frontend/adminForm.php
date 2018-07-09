<?php $title = 'JF - Connexion administrateur';
ob_start(); ?>

<!-- CONNEXION ADMIN -->
<h2>Connexion administrateur</h2>

<div class="news">
    <form action="index.php?action=login" method="post" class="connexionAdmin">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required /><br />
        <label for="password">Mot de passe</label>
        <input type="password" class="password" name="password" required /><br />
        <input type="submit" name="connexion" class="buttonStyle" value="Connexion" />
    </form>
</div>

<?php $content = ob_get_clean(); ?>