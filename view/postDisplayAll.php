<?php $title = 'JF - Billets';
ob_start(); // Permet de mémoriser le code html qui suit en le mettant dans la variable "content"

if (!empty($_SESSION['admin'])) {
?>
<!-- MODIFICATION POST IF ADMIN-->
<h2>Ajout d'un billet</h2>

<div class="news">
    <form action="index.php?action=addPost" method="post">
        <div>
        	<label for="title">Titre</label><br />
            <input type="text" id="title" name="title" /><br />
            <label for="content">Contenu</label><br />
            <textarea id="content" name="content" /></textarea>
            <input type="submit" name="newPost" class="buttonStyle" value="Ajouter" />
        </div>
    </form>
</div>
<?php
}
?>

<?php $this->pagination($nbPost); ?> <!-- on est ici à l'intérieur de displayView, qui affiche la vue. On est donc au sein de la classe MainControler, on peut donc utiliser des méthodes de cette classe -->

<h2>Billets en ligne</h2>
<!-- POSTS : affiche chaque entrée une à une (avec sécurité pour les failles XSS) -->
<?php
while ($data = $posts->fetch()) {
?>

	<div class="news">
		<h3><?php echo htmlspecialchars($data['title']); ?></h3>
		<i class="smallInfosText">publié le <?php echo htmlspecialchars($data['creation_date_fr']); ?></i>

<!-- EDIT & DELETE POST IF ADMIN-->
<?php
if (!empty($_SESSION['admin'])) {
?>
		<a href="index.php?action=editPostForm&amp;id=<?php echo htmlspecialchars($data['id']); ?>"><i class="fa fa-pencil" title="Modifier" aria-hidden="true"></i></a>

		<a href="index.php?action=deletePost&amp;id=<?php echo htmlspecialchars($data['id']); ?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ce billet ?'));"><i class="fa fa-trash" title="Supprimer" aria-hidden="true"></i></a>
<?php
}
?>
        <p><?php echo $this->getExcerpt($data['content']); ?></p> <!-- on utilise ici un $this car on est toujours dans la méthode "displayAllPost" du frontendControler -->
        <a class="buttonStyle" href="index.php?action=displayOnePost&amp;id=<?php echo htmlspecialchars($data['id']); ?>">Lire la suite...</a>
	</div>
<?php
}
$posts->closeCursor(); // Termine le traitement de la requête
$this->pagination($nbPost);
$content = ob_get_clean(); ?>
