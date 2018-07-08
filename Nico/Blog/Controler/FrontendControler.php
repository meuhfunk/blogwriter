<?php // CONTROLER - USER
namespace Nico\Blog\Controler;
class FrontendControler extends MainControler
{
// COMMENTS
	public function signal($commentId, $postId) {
		$commentManager = new \Nico\Blog\Model\CommentManager();
		$signal = $commentManager->signalComment($commentId);
		if ($signal > 0) {
			header('Location: index.php?action=displayOnePost&signaled=true&id=' . $postId);
		} else {
    		$this->error('Ce message a déjà été signalé et va être modéré prochainement, merci !');
		}
	}
// ADMIN ACCOUNT
	public function adminForm() {
		$this->displayView('frontend/adminForm'); // on utilise $this (qui représente ici la classe frontedncontroler) pour appeler une méthode de sa classe, héritée ou non
	}
	public function checkLogin($password, $email) {
		$adminManager = new \Nico\Blog\Model\AdminManager();
		$adminInfo = $adminManager->checkLogin($_POST['password'], $_POST['email']);
        if (is_array($adminInfo)) { // on vérifie que l'on est en présence d'un tableau, car la méthode checkLogin retourne soit un tableau (dans la variabe $adminInfo), soit false.
            $_SESSION['admin'] = true;
            $_SESSION['pseudo'] = $adminInfo['pseudo']; // va chercher l'info pseudo contenu dans le tableau data contenu dans la variable adminInfo lorsque status = ok
            $_SESSION['email'] = $adminInfo['email'];
        	header('Location: index.php?action=adminIndex');
        } else {
    		$this->error('Votre pseudo ou votre mot de passe est incorrect !');
        }
	}
}
