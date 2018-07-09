<?php // MODEL
namespace Nico\Blog\Model;

class CommentManager extends Manager
{
    public function getComments($postId) // récupère les commentaires associés à un id de post
    {
		$db = $this->dbConnect();
	    $comments = $db->prepare('SELECT id, id_post, author, comment, signalised, DATE_FORMAT(comment_date, \'%d/%m/%Y (%Hh%imin%ss)\') AS comment_date_fr FROM comments WHERE id_post = ? ORDER BY comment_date DESC');
	    $comments->execute(array($postId)); // permet d'exécuter la requête après avoir inséré les valeurs de façon sécurisée
    	return $comments;
	}

	public function postComment($postId, $author, $comment) // fonction qui permet d'ajouter un commentaire
    {
	    $db = $this->dbConnect();
	    $comments = $db->prepare('INSERT INTO comments(id_post, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
	    $affectedLines = $comments->execute(array($postId, $author, $comment));
   		return $affectedLines;
	}

	public function selectComment($commentId)
	{
		$db = $this->dbConnect();
		$comment = $db->prepare('SELECT id, comment, id_post FROM comments WHERE id = ?');
		$comment->execute(array($commentId));
		$comment = $comment->fetch();
		return $comment;
	}

	public function editComment($commentId, $comment) // fonction qui permet de modifier un commentaire
	{
	    $db = $this->dbConnect();
	    $req = $db->prepare('UPDATE comments SET comment = ?, signalised = 0 WHERE id = ?');
	    $req->execute(array($comment, $commentId));
        $edit = $req->rowCount(); // permet de compter le nombre de ligne affectées par la dernière requête
        return $edit;
	}

	public function signalComment($commentId)
	{
	    $db = $this->dbConnect();
		$req = $db->prepare('UPDATE comments SET signalised = 1 WHERE id = ?');
		$req->execute(array($commentId));
		$signal = $req->rowCount(); // permet de compter le nombre de ligne affectées par la dernière requête
		return $signal;
	}

	    public function getCommentsSignalised() // récupère les commentaires signalés associés à un id de post
    {
		$db = $this->dbConnect();
	    $comments = $db->query('SELECT comments.id, posts.title, comments.id_post, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y (%Hh%imin%ss)\') AS comment_date_fr FROM comments INNER JOIN posts ON posts.id = comments.id_post WHERE signalised = 1 ORDER BY comment_date DESC');
    	return $comments;
	}

    public function deleteComment($commentId) { // permet de supprimer un commentaire de la bdd
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id = ?');
        $req->execute(array($commentId));
        $delete = $req->rowCount(); // permet de compter le nombre de ligne affectées par la dernière requête
        return $delete;
    }
}