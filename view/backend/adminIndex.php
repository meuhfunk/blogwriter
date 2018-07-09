<?php $title = 'JF - Accueil administrateur';
ob_start(); ?>

<!-- CONNEXION ADMIN -->
<h2>Bienvenue sur l'interface administrateur, <?php echo $_SESSION['pseudo']; ?> !</h2>

<div class="news">
    <p>Vous pouvez ajouter, modifier ou supprimer des billets en cliquant sur le lien "<strong>Billets</strong>".</p>
    <p>Vous pouvez visualiser les commentaires signalés par les utilisateurs et les modifier ou supprimer en cliquant sur le lien "<strong>Commentaires</strong>".</p>
    <p>Enfin, vous avez la possibilité de modifier votre pseudo et mot de passe en cliquant sur "<strong>paramètres compte</strong>".</p>
</div>

<?php $content = ob_get_clean(); ?>