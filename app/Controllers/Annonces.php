<?php

namespace SYRADEV\AutoEncheres\Controller;

// On utilisera ici la classe de manipulation de la base de données.
use SYRADEV\AutoEncheres\Utils\Database\Conx;

/*
 *  Classe de gestion des annonces étendue depuis la classe Controller.
 */
class Annonces extends Controller
{

    /*
    * Affiche la liste des annonces.
    */
    public function list() {
        // Requete de type SELECT * sur la table annonces.
        $sql = 'SELECT * FROM `annonces` ORDER BY `date_fin_enchere`';
        // Exécution de la requête
        $annonces = Conx::getInstance()->requete($sql);
        // Transmission des annonce à la vue (Layout + liste).
        return $this->render('layouts.default','annonces.list', $annonces);
    }

    // Affiche une annonce à partir de son uid
    public function annonce($uid) {
        // Requete de type SELECT * sur la table annonces à partir de son uid.
        $sql = 'SELECT * FROM `annonces` WHERE `uid`=' . $uid;
        $annonce = Conx::getInstance()->requete($sql);
        // Transmission de l'annonce à la vue (Layout + détails).
        return $this->render('layouts.content','annonces.annonce', $annonce);
    }

    // Renvoie les détails d'une annonce à partir de son uid
    public static function annonceDetails($uid) {
        // Requete de type SELECT * sur la table annonces à partir de son uid.
        $sql = 'SELECT * FROM `annonces` WHERE `uid`=' . $uid;
        // Renvoie directement les détails de l'annonce.
        return Conx::getInstance()->requete($sql);
    }

}