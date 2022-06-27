<?php

namespace SYRADEV\AutoEncheres\Model;

/*
 * Modèle Utilisateurs
 */
class Utilisateurs
{
    protected string $nom;
    protected string $prenom;
    protected string $email;
    protected string $password;

    public function __construct($userInfos) {
        $this->nom = $userInfos['nom'];
        $this->prenom = $userInfos['prenom'];
        $this->email = $userInfos['email'];
        $this->password = md5($userInfos['password']);
        return $this;
    }
}