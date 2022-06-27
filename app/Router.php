<?php

// Inclusion du chargement automatique des classes
require_once dirname(__FILE__) . '/Utils/Autoload.php';

use SYRADEV\AutoEncheres\Controller\Annonces;
use SYRADEV\AutoEncheres\Controller\Auth;
use SYRADEV\AutoEncheres\Controller\Encheres;

session_start();

// Gestion des appels avec POST
if(!empty($_POST)) {
    if(isset($_POST['login']) && $_POST['login']==='1') {
        $auth = new Auth();
        $auth->login($_POST);
    }
    if(isset($_POST['register']) && $_POST['register']==='1') {
        $auth = new Auth();
        $newuser = $auth->register($_POST);
        header('location: /?login=1');
    }

}

// Gestion des appels avec GET
if(!empty($_GET)) {
    if(isset($_GET['register']) && $_GET['register']==='1') {
        $auth = new Auth();
        echo $auth->registerDisplay();
        exit();
    }
    if(isset($_GET['login']) && $_GET['login']==='1') {
        $auth = new Auth();
        echo $auth->loginDisplay();
        exit();
    }
    if(isset($_GET['logout']) && $_GET['logout']==='1') {
        $auth = new Auth();
        echo $auth->logout();
        exit();
    }
    if(isset($_GET['enchere']) && $_GET['enchere']==='1') {
        if(isset($_GET['annonce'])) {
            if (!isset($_SESSION['email']) || !isset($_SESSION['password']) || !isset($_SESSION['nom']) || !isset($_SESSION['prenom']) || !isset($_SESSION['userid'])) {
                $auth = new Auth();
                echo $auth->loginDisplay();
                exit();
            } else {
                $annonceId = $_GET['annonce'];
                $annonceDetails = Annonces::annonceDetails($annonceId);
                $enchere = new Encheres();
                echo $enchere->setEnchereDisplay($annonceDetails);
                exit();
            }
        }
    }
}


// Gestion des appels avec AJAX fetch
// Récupère le flux JSON posté
$json = file_get_contents('php://input');
// Convertit le flux JSON en tableau d'objets
$data = json_decode($json);
// Route vers le controller correspondant
if(!empty($data)) {
    if(isset($data->annonce)) {
        $annonces = new Annonces();
        echo $annonces->annonce($data->annonce);
        exit();
    }
}
