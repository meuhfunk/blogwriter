<?php // Model
namespace Nico\Blog\Model;

class PostManager extends Manager
{
    public function getPosts($firstPost) { // renvoie la liste des posts
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y (%Hh%imin%ss)\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT ?, 5');
        $req->bindValue(1, $firstPost, \PDO::PARAM_INT); // permet d'insérer la variable $firstPost dans la requête sql (en tant que nombre entier et pas string)
        $req->execute();
        return $req;
    }

    public function getPost($postId) { // récuperation d'un post en fonction de son id
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y (%Hh%imin%ss)\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;
    }

    public function postPost($title, $content) { // ajout d'un post
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES (?, ?, NOW())');
        $req->execute(array($title, $content));
        $affectedLines = $req->rowCount(); // permet de compter le nombre de ligne affectées par la dernière requête
        return $affectedLines;
    }

    public function editPost($title, $content, $postId) { // fonction qui permet de modifier un post
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE posts SET title = ?, content = ? WHERE id = ?');
        $req->execute(array($title, $content, $postId));
        $edit = $req->rowCount(); // permet de compter le nombre de ligne affectées par la dernière requête
        return $edit;
    }

    public function deletePost($postId) { // permet de supprimer un billet et ses commentaires associés de la bdd
        $db = $this->dbConnect();
        $comment = $db->prepare('DELETE FROM comments WHERE id_post = ?');
        $comment->execute(array($postId));
        $post = $db->prepare('DELETE FROM posts WHERE id = ?');
        $post->execute(array($postId));
        $delete = $post->rowCount(); // permet de compter le nombre de ligne affectées par la dernière requête
        return $delete;
    }

    public function nbPost() { // Compte le nombre total de billets contenu dans la bdd
        $db = $this->dbConnect();
        $req = $db->query('SELECT COUNT(*) FROM posts');
        $nbPost = $req->fetchColumn();
        return $nbPost;
    }
}