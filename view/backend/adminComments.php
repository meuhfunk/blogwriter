<?php $title = 'JF - Commentaires signalés';
ob_start(); ?>

<!-- AFFICHAGE DES COMMENTAIRES SIGNALES -->
<h2>Commentaires signalés</h2>

<?php
while ($comment = $comments->fetch()) { // fetch permet de récupérer le résultat d'une requête
?>
    <div class="news">
        <div class="commentStyle">
            <strong><?php echo htmlspecialchars($comment['author']); ?></strong>
            <i class="smallInfosText">- <?php echo htmlspecialchars($comment['comment_date_fr']); ?></i>

            <span class="editDeleteIcons"><a href="index.php?action=editCommentForm&amp;id=<?php echo htmlspecialchars($comment['id']); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></span>

            <a href="index.php?action=deleteComment&amp;id=<?php echo htmlspecialchars($comment['id']); ?>&amp;id_post=<?php echo htmlspecialchars($comment['id_post']); ?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ce commentaire ?'));"><i class="fa fa-trash" aria-hidden="true"></i></a>

            <p><?php echo htmlspecialchars($comment['comment']); ?></p>
        </div>
        <div class="linkComment">
            <p>En provenance du billet "<a href="index.php?action=displayOnePost&amp;id=<?php echo htmlspecialchars($comment['id_post']); ?>" class="titleComment"><?php echo htmlspecialchars($comment['title']); ?></a>"</p>
        </div>
    </div>
<?php
}
?>

<?php $content = ob_get_clean(); ?>