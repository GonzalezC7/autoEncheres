<?php

namespace SYRADEV\AutoEncheres\Utils\Database;

use PDO;
use PDOException;

/**
 * Définition de la classe Conx qui se connecte à la base de données
 */
final class Conx
{
    private static $connect = null;
    private PDO $conx;
    private string $host = 'localhost';
    protected string $database = 'auto-enchere';
    private string $user = 'root';
    private string $password = 'root';

    private function __construct()
    {



        //Création d'un lien à la base de données de type PDO
        try {
            $this->conx = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database, $this->user, $this->password, [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
            $this->conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $message =  'Erreur !: ' . $e->getMessage() . '<hr />';
            die($message);
        }
    }

    public static function getInstance()
    {
        if (is_null(self::$connect)) {
            self::$connect = new conx();
        }
        return self::$connect;
    }

    // Permet d'effectuer une requête SQL. Retourne le résultat (s'il y en a un) de la requête sous forme d'un tableau.
    public function requete($req)
    {
        return $this->conx->query($req, PDO::FETCH_ASSOC)->fetchAll();
    }

    // Permet de préparer une requête SQL. Retourne la requête préparée sous forme d'objet
    public function preparation($req)
    {
        return $this->conx->prepare($req);
    }

    // Permet d'exécuter une requête SQL préparée. Retourne le résultat (s'il y en a un) de la requête sous forme d'objet
    public function execution($query, $tab)
    {
        return $query->execute($tab);
    }

    // Retourne l'id de la dernière insertion par auto-incrément dans la base de données
    public function dernierIndex()
    {
        return $this->conx->lastInsertId();
    }
}