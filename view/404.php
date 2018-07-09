<?php $title = 'JF - 404';
ob_start(); ?>

<h2 class="buttonStyle">Erreur 404 !</h2>

<div class="news">
	<div class="alert alert-warning">Cette page n'existe pas !</div>
	<input class="buttonStyle" onclick="window.history.back();" type="button" value="Retour" /> <!-- javascript qui permet le retour à la page précédente -->
</div>

<?php $content = ob_get_clean(); ?>