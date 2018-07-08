<?php // CONTROLER - MAIN (fonction utilisées dans le frontend ET le backend)
namespace Nico\Blog\Controler;
class MainControler
{
// TOKENS
    protected $token;
    public function __construct() {
        $this->generateToken();
    }
    protected function generateToken() {
        $this->token = bin2hex(random_bytes(32));;
    }

// PAGINATION
	public function pagination($nbPost) {
		require('./view/pagination.php');
	}
// ERROR
	public function error($message = 'Erreur') {
		$variables = array( // création d'un tableau contenant une variable, afin de pouvoir utiliser celle-ci dans un autre contexte, ici, créé par la méthode displayView)
			'message' => $message,
		);
		$this->displayView('error', $variables); // on utilise $this (qui représente ici la classe MainControler) pour appeler une méthode de cette classe. Ici, on appelle la méthode displayView et ses arguments.
	}
// POSTS
	public function displayView($view = 'postDisplayAll', $variables = array()) {
		extract($variables); // fonction qui sert à aller chercher les variables contenues dans une variable contenant un array, et permet de les réutiliser ailleurs
		require('./view/' . $view . '.php');
		if (!empty($_SESSION['admin'])) {
			require('./view/backend/adminTemplate.php');
		} else {
			require('./view/frontend/template.php');
		}
	}
	public function displayAllPost($firstPost = 0) {
		$postManager = new \Nico\Blog\Model\PostManager(); // Création de l'objet postManager
		$nbPost = $postManager->nbPost(); // Appel de la méthode nbPost (qui n'a ici pas d'argument), qui se trouve dans l'objet postManager
		if ($nbPost > 0) {
			$posts = $postManager->getPosts($firstPost);
			$variables = array(
				'posts' => $posts,
				'nbPost' => $nbPost,
			);
			$this->displayView('postDisplayAll', $variables);
		} else {
    		$this->error('Il n\'y a aucun billet à afficher !');
    	}
	}
		public function displayOnePost($postId, $signalised = false) {
		$postManager = new \Nico\Blog\Model\PostManager();
		$commentManager = new \Nico\Blog\Model\CommentManager();
		$post = $postManager->getPost($postId);
		if (!empty($post)) {
			$comments = $commentManager->getComments($postId);
			$variables = array(
				'post' => $post,
				'comments' => $comments,
				'signalised' => $signalised,
			);
			$this->displayView('postDisplayOne', $variables);
		} else {
    		$this->error('Il n\'y a aucun billet à afficher !');
		}
	}
    public function getExcerpt($string, $start = 0, $maxLength = 300) { // Affiche un extrait d'un billet et donne des valeurs par défaut qui sont modifiable lorsque on fait appel à la méthode (à cause de tinyMCE, il faut penser à prendre en compte les balises html, non visible sur le site mais considérées par le maxLength)
        if (strlen($string) > $maxLength) { // si le texte est supérieur à 300 caractères
            $string = substr($string, $start, $maxLength); // affiche le texte, depuis le premier caractère, jusqu'à 300 caractères
            $string  .= '...';
        }
        return $string;
    }
// COMMENTS
    public function addComment($postId, $author, $comment) {
		$commentManager = new \Nico\Blog\Model\CommentManager();
		$success = $commentManager->postComment($postId, $author, $comment);
		if ($success != false) {
			header('Location: index.php?action=displayOnePost&id=' . $postId); // le . sert à "concaténer", c'est à dire à mettre côte à côte des chaines de caractère
	    } else {
			$this->error('Impossible d\'ajouter le commentaire !');
	    }
	}
}
