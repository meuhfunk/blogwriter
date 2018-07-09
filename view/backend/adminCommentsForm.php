<?php $title = 'JF - Modifier un commentaire';
ob_start(); ?>
           
<!-- MODIFICATION DU COMMENTAIRE -->
<h2>Modifier le commentaire</h2>
<input class="buttonStyle" onclick="window.history.back();" type="button" value="Annuler" /> <!-- javascript qui permet le retour à la page précédente -->

<div class="news">
    <form action="index.php?action=editComment" method="post">
        <div>
            <label for="comment">Commentaire</label><br />
            <input id="comment" name="comment" value="<?php echo nl2br(htmlspecialchars($comment['comment'])) ?>" />
            <input name="id_post" type="hidden" value="<?php echo (htmlspecialchars($comment['id_post'])) ?>"/ >
            <input name="id" type="hidden" value="<?php echo (htmlspecialchars($comment['id'])) ?>"/ >
            <input name="token" type="hidden" value="<?php echo $this->getToken(); ?>"/ > <!-- this est ici le BackendControler -->
            <input type="submit" class="buttonStyle" name="newComment" value="Modifier" />
        </div>
    </form>
</div>

<?php $content = ob_get_clean(); ?>