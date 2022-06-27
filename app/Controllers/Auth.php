<?php


namespace SYRADEV\AutoEncheres\Controller;

// On utilisera ici la classe de manipulation de la base de données.
use SYRADEV\AutoEncheres\Utils\Database\Conx;

use SYRADEV\AutoEncheres\Model\Utilisateurs;

// Classe d'authentification étendue depuis la classe Controller.
class Auth extends Controller
{
    // Affiche le formulaire de connexion utilisateur
    public function loginDisplay() {
        return $this->render('layouts.default','auth.login');
    }

    // Connecte l'utilisateur.
    public function login($credentials) {
        $escobar = $credentials['escobar'];
        $email = $credentials['email'];
        $password = $credentials['password'];
        if($escobar === '') {
            // Requete de type SELECT * sur la table utilisateurs.
            $sql = 'SELECT * FROM `utilisateurs` WHERE `email`="' . $email . '" AND `password`="' . MD5($password) . '"';
            $login = Conx::getInstance()->requete($sql);
            if(is_array($login) && !empty($login)) {
                $_SESSION['nom'] = $login[0]['nom'];
                $_SESSION['prenom'] = $login[0]['prenom'];
                $_SESSION['email'] = $login[0]['email'];
                $_SESSION['password'] = $login[0]['email'];
                $_SESSION['userid'] = $login[0]['uid'];
            }
            return true;
        }
    }

    // Déconnecte l'utilisateur.
    public function logout() {
        // On démarre la session
        session_start ();
        // On détruit les variables de session
        session_unset ();
        // On détruit la session
        session_destroy ();
        // On redirige le visiteur vers la page d'accueil
        header ('location: /');
    }

    // Affiche le formulaire d'enregistrement utilisateur.
    public function registerDisplay() {
        return $this->render('layouts.default','auth.register');
    }

    // Enregistre l'utilisateur.
    public function register($userInfos) {
        $escobar = $userInfos['escobar'];
        if($escobar === '') {
            return new Utilisateurs($userInfos);
        } else {
            return false;
        }
    }

}