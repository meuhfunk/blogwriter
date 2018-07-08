<?php
session_start();
require('autoloader/autoloader.php'); // chargement de l'autoloader
Autoloader::register();
$frontendControler = new \Nico\Blog\Controler\FrontendControler();
$backendControler = new \Nico\Blog\Controler\BackendControler();
// Permet de récupérer le numéro du premier billet de la page à afficher (5 billets/page)
if (!isset($_GET['page']) || $_GET['page'] < 0) { // Si la variable page n'est pas définie
    $page = 1;
} else {
    $page = htmlspecialchars($_GET['page']); // Sinon lecture de la page
}
$firstPost = 5 * ($page - 1); // Calcul pour determiner le premier billet de la page
// GESTION DES ACTIONS
if (!empty($_GET['action'])) {
    if ($_GET['action'] == 'displayOnePost') {
        if (!empty($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_GET['signaled'])) {
                $frontendControler->displayOnePost($_GET['id'], true); // si signaled existe, sa valeur est true
            } else {
                $frontendControler->displayOnePost($_GET['id']); // sinon, elle garde sa valeur par défaut (false)
            }
        } else {
            $frontendControler->error('L\'identifiant du billet n\'existe pas...');
        }

    } elseif ($_GET['action'] == 'addComment') {
        if (!empty($_GET['id']) && $_GET['id'] > 0) {
            if (!empty(trim($_POST['author'])) && !empty(trim($_POST['comment']))) {
                $frontendControler->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            } else {
                $frontendControler->error('Tous les champs ne sont pas remplis !');
            }
        } else {
            $frontendControler->error('L\'identifiant du billet n\'existe pas...');
        }
    } elseif (empty($_SESSION['admin'])) { // vérifie si une session admin existe ou non (en l'occurence, non), et permet donc uniquement l'exécution des actions front suivantes :
    // FRONT COMMENTS
        if ($_GET['action'] == 'signalComment') {
            if (!empty($_GET['id']) && $_GET['id'] > 0) {
                $frontendControler->signal($_GET['id'], $_GET['postId']);
            } else {
                $frontendControler->error('L\'identifiant du billet n\'existe pas...');
            }
    // FRONT ADMIN ACCOUNT
        } elseif ($_GET['action'] == 'loginForm') {
            $frontendControler->adminForm();
        } elseif ($_GET['action'] == 'login') {
            if (!empty($_POST['password']) AND !empty($_POST['email'])) {
                $frontendControler->checkLogin($_POST['password'], $_POST['email']);
            } else {
                $frontendControler->error('Tous les champs ne sont pas remplis !');
            }
    // ERROR (if a non-admin action is executed with empty($_SESSION['admin'])
        } else {
            header('HTTP/1.0 404 Not Found');
            $frontendControler->displayView('404');
            exit;
        }
    } else { // Sinon, si une session existe, les actions back qui suivent peuvent s'exécuter :
    // BACK POSTS
        if ($_GET['action'] == 'editPostForm') {
            if (!empty($_GET['id']) && $_GET['id'] > 0) {
                $_SESSION['token'] = $backendControler->getToken(); // assigne la variable de session à la valeur du token actuel
                $backendControler->editPostForm($_GET['id']);
            } else {
                $backendControler->error('L\'identifiant du billet n\'existe pas...');
            }
        } elseif ($_GET['action'] == 'addPost') {
            if (!empty(trim($_POST['title'])) && !empty(trim($_POST['content']))) {
                $backendControler->addPost($_POST['title'], $_POST['content']);
            } else {
                $backendControler->error('Tous les champs ne sont pas remplis !');
            }
        } elseif ($_GET['action'] == 'editPost') {
            if (!empty($_GET['id']) && $_GET['id'] > 0 && !empty(trim($_POST['title'])) && !empty(trim($_POST['content']))) {
                $backendControler->editPost($_POST['title'], $_POST['content'], $_GET['id'], $_POST['token']);
            } else {
                $backendControler->error('L\'identifiant du billet n\'existe pas et/ou tous les champs ne sont pas remplis.');
            }
        } elseif ($_GET['action'] == 'deletePost') {
            $backendControler->deletePost($_GET['id']);
    // BACK COMMENTS
        } elseif ($_GET['action'] == 'displaySignalisedCommentsAdmin') {
            $backendControler->adminComments();
        } elseif ($_GET['action'] == 'editCommentForm') {
            if (!empty($_GET['id']) && $_GET['id'] > 0) {
                $_SESSION['token'] = $backendControler->getToken(); // assigne la variable de session à la valeur du token actuel
                $backendControler->editCommentForm($_GET['id']);
            } else {
                $backendControler->error('L\'identifiant du billet n\'existe pas...');
            }
        } elseif ($_GET['action'] == 'editComment') {
            if (!empty($_POST['id']) && $_POST['id'] > 0 && !empty(trim($_POST['comment'])) && !empty($_POST['id_post']) && $_POST['id_post'] > 0) {
                $backendControler->editComment($_POST['id'], $_POST['comment'], $_POST['id_post'], $_POST['token']);
            } else {
                $backendControler->error('Tous les champs ne sont pas remplis !');
            }
        } elseif ($_GET['action'] == 'deleteComment') {
            $backendControler->deleteComment($_GET['id'], $_GET['id_post']);
    // BACK ADMIN ACCOUNT
        } elseif ($_GET['action'] == 'adminIndex') {
            $backendControler->adminIndex();
        } elseif ($_GET['action'] == 'adminAccountModificationsForm') {
            $backendControler->adminAccountModificationsForm();
        } elseif ($_GET['action'] == 'pseudoUpdate') {
            if  (!empty($_POST['newPseudo']) && !empty($_POST['password'])) {
                $backendControler->pseudoUpdate($_POST['newPseudo'], $_POST['password']);
            } else {
                $backendControler->error('Tous les champs ne sont pas remplis !');
            }
        } elseif ($_GET['action'] == 'passUpdate') {
            if  (!empty($_POST['password']) && !empty($_POST['newPassword']) && !empty($_POST['checkPassword'])) {
                $backendControler->passUpdate($_POST['password'], $_POST['newPassword']);
            } else {
                $backendControler->error('Tous les champs ne sont pas remplis !');
            }
        } elseif ($_GET['action'] == 'logout') {
            $backendControler->logout();
        } else {
            $frontendControler->displayView('404');
        }
    }
} else {
$frontendControler->displayAllPost($firstPost);
}
