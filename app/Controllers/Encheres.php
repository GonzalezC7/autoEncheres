<?php

namespace SYRADEV\AutoEncheres\Controller;

// On utilisera ici la classe de manipulation de la base de données.
use SYRADEV\AutoEncheres\Utils\Database\Conx;

/*
 * Classe de gestion des enchères étendue depuis la classe Controller.
 */
class Encheres extends Controller
{
    // Affiche le formulaire de positionnement d'une enchère sur une annonce.
    public function setEnchereDisplay($annonce) {
        return $this->render('layouts.default','encheres.new', $annonce);
    }

    public function setEnchere() {

    }

    public function getLastEnchere($annonce) {

    }


}