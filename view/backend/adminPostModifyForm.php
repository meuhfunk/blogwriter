<?php $title = 'JF - Modifier un billet';
ob_start(); ?> <!-- Permet de mémoriser le code html qui suit en le mettant dans la variable "content" -->
           
<!-- MODIFICATION DU BILLET -->
<h2>Modifier le billet</h2>
<input class="buttonStyle" onclick="window.history.back();" type="button" value="Annuler" /> <!-- javascript qui permet le retour à la page précédente -->

<div class="news">
    <form action="index.php?action=editPost&amp;id=<?php echo htmlspecialchars($_GET['id']) ?>" method="post">
        <div>
            <label for="title">Titre</label><br />
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($post['title'] )?>" /><br />
            <label for="content">Contenu</label><br />
            <textarea id="content" name="content"><?php echo htmlspecialchars($post['content']) ?></textarea>
            <input name="token" type="hidden" value="<?php echo $this->getToken(); ?>"/ > <!-- this est ici le BackendControler -->
            <input type="submit" name="newPost" class="buttonStyle" value="Modifier" />
        </div>
    </form>
</div>

<?php $content = ob_get_clean(); ?>