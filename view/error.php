<?php $title = 'JF - Erreur';
ob_start(); ?>

<h2 class="buttonStyle">Erreur !</h2>

<div class="news">
	<div class="alert alert-warning"><?php echo $message; ?></div>
	<input class="buttonStyle" onclick="window.history.back();" type="button" value="Retour" /> <!-- javascript qui permet le retour à la page précédente -->
</div>

<?php $content = ob_get_clean(); ?>