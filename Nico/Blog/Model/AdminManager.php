<?php // Model
namespace Nico\Blog\Model;
class AdminManager extends Manager
{
    public function checkLogin($password, $email) {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT pseudo, password, email FROM admin WHERE email = ?');
        $req->execute(array($email));
        $admin = $req->fetch();
        if (password_verify($password, $admin['password'])) { // fonction PHP qui vérifie si les mots de passe (crypté et clair) sont identiques (celui rentré et celui de la bdd)
            $adminInfo = array(
                'pseudo' => $admin['pseudo'],
                'email' => $admin['email'],
            );
            return $adminInfo;
        } else {
            return false;
        }
    }
    public function pseudoUpdate($pseudo, $password) { // pour gérer les modifs d'id du compte admin
        $db = $this->dbConnect();
        $checkLogin = $this->checkLogin($password, $_SESSION['email']);
        if (is_array($checkLogin)) {
            $req = $db->prepare('UPDATE admin SET pseudo = ? WHERE email = ?');
            $req->execute(array($pseudo, $_SESSION['email']));
            $pseudoUp = $req->rowCount(); // permet de compter le nombre de ligne affectées par la dernière requête
            return $pseudoUp;
        } else {
            return false;
        }
    }
        public function passUpdate($password, $newPassword) { // pour gérer les modifs de mdp du compte admin
        $db = $this->dbConnect();
        $checkLogin = $this->checkLogin($password, $_SESSION['email']);
        if (is_array($checkLogin)) {
            $newPassword = password_hash($newPassword, PASSWORD_DEFAULT); // Hachage du mot de passe
            $req = $db->prepare('UPDATE admin SET password = ? WHERE email = ?');
            $req->execute(array($newPassword, $_SESSION['email']));
            $passUp = $req->rowCount(); // permet de compter le nombre de ligne affectées par la dernière requête
            return $passUp;
        } else {
            return false;
        }
    }
}
