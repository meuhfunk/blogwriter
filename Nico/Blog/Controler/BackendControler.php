<?php // CONTROLER - ADMIN
namespace Nico\Blog\Controler;

class BackendControler extends MainControler
{
// TOKENS
    public function __construct() { // permet d'hériter des variables propres au parent
        parent::__construct();
    }
    public function getToken() { // retourne le token généré quand on a créé un nouvel objet FrontendController dans l'index
        return $this->token;
    }

// POSTS
	public function adminIndex() {
		$this->displayView('backend/adminIndex'); // on utilise $this pour appeler une méthode de sa propre classe
	}

	public function editPostForm($postId) {
		$postManager = new \Nico\Blog\Model\PostManager();
	    $post = $postManager->getPost($postId);
	    if (!empty($post)) {
			$variables = array(
				'post' => $post,
			);
			$this->displayView('backend/adminPostModifyForm', $variables);
		} else {
			$this->error('Impossible d\'éditer le billet !');
	    }
	}

	public function addPost($title, $content) {
		$postManager = new \Nico\Blog\Model\PostManager();
		$success = $postManager->postPost($title, $content);
		if ($success > 0) {
			header('Location: index.php');
	    } else {
			$this->error('Impossible d\'ajouter le billet !');
	    }
	}

	public function editPost($title, $content, $postId, $token) {
		$postManager = new \Nico\Blog\Model\PostManager();
		$success = $postManager->editPost($title, $content, $postId);
		if ($_SESSION['token'] != $token) { // vérifie si le token de session correspond à celui qui vient du formulaire
            $this->error('Erreur de session');
        }
		elseif ($success > 0) {
            header('Location: index.php?action=displayOnePost&id='. $postId);
		} else {
			$this->error('Impossible d\'éditer le billet !');
		}
	}

	public function deletePost($postId) {
		$postManager = new \Nico\Blog\Model\PostManager();
	    $deletePost = $postManager->deletePost($postId);
	 	if ($deletePost > 0) {
	 		header('Location: index.php'); // renvoie l'admin sur la page admin des posts
		} else {
			$this->error('Aucun billet n\'a été effacé...');
		}
	}

// COMMENTS
	public function adminComments() {
		$commentManager = new \Nico\Blog\Model\CommentManager();
		$comments = $commentManager->getCommentsSignalised();
		if (!empty($comments)) {
			$variables = array(
				'comments' => $comments,
			);
			$this->displayView('backend/adminComments', $variables);
		} else {
			$this->error('Il n\'y a aucun commentaire à modérer !');
		}
	}

	public function editComment($commentId, $comment, $postId, $token) {
        $commentManager = new \Nico\Blog\Model\CommentManager();
        $editComment = $commentManager->editComment($commentId, $comment);
        if ($_SESSION['token'] != $token) { // vérifie si le token de session correspond à celui qui vient du formulaire
            $this->error('Erreur de session');
        }
        elseif ($editComment > 0) {
            header('Location: index.php?action=displayOnePost&id='. $postId);
        } else {
            $this->error('Impossible d\'éditer le commentaire...');
        }
    }

	public function deleteComment($commentId, $postId) {
		$commentManager = new \Nico\Blog\Model\CommentManager();
	    $deleteComment = $commentManager->deleteComment($commentId);
	    if ($deleteComment > 0) {
	        header('Location: index.php?action=displayOnePost&id='. $postId);
		} else {
			$this->error('Aucun commentaire n\'a été effacé...');
		}
	}

	public function editCommentForm($commentId) {
		$commentManager = new \Nico\Blog\Model\CommentManager();
		$comment = $commentManager->selectComment($commentId);
		if (!empty($comment)) {
			$variables = array(
				'comment' => $comment,
			);
			$this->displayView('backend/adminCommentsForm', $variables);
	    } else {
			$this->error('Ce commentaire n\'existe pas !');
	    }
	}

// ADMIN ACCOUNT
	public function adminAccountModificationsForm() {
		$this->displayView('backend/adminAccount');
	}

	public function pseudoUpdate($pseudo, $password) {
		$adminManager = new \Nico\Blog\Model\AdminManager();
		$pseudoUp = $adminManager->pseudoUpdate($pseudo, $password);
		if ($pseudoUp > 0) { // rapport au rowCount, on vérifie si une ligne a été modifiée (voir AdminManager.php méthode pseudoUpdate)
			$_SESSION['pseudo'] = $pseudo;
			header('Location: index.php?action=adminAccountModificationsForm');
	    } else {
			$this->error('Impossible de modifier le pseudo !');
	    }
	}

	public function passUpdate($password, $newPassword) {
		$adminManager = new \Nico\Blog\Model\AdminManager();
		$passUp = $adminManager->passUpdate($password, $newPassword);
		if ($passUp > 0 && $_POST['newPassword'] == $_POST['checkPassword']) {
			header('Location: index.php?action=adminAccountModificationsForm&success=true');
	    } else {
			$this->error('Impossible de modifier le mot de passe !');
	    }
	}

	public function logout() {
	    session_destroy();
		header('Location: index.php');
	}

}
