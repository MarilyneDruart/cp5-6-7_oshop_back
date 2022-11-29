<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

class AppUser extends CoreModel
{
    private $email;
    private $password;
    private $firstname;
    private $lastname;
    private $role;
    private $status;

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

    }
    
    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;
    }
    

    /**
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public static function find($appUserId)
    {
        // se connecter à la BDD
        $pdo = Database::getPDO();

        // écrire notre requête
        $sql = 'SELECT * FROM app_user WHERE id = :id';

        // exécuter notre requête
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->execute([
            ':id' => $appUserId,
        ]);

        // un seul résultat => fetchObject
        $appUser = $pdoStatement->fetchObject('App\Models\AppUser');

        // retourner le résultat
        return $appUser;
    }

    /**
     * Méthode permettant de récupérer tous les enregistrements de la table app_user
     *
     * @return AppUser[]
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `app_user`';
        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\AppUser');

        return $results;
    }

    public function insert()
    {
        $pdo = Database::getPDO();

        // On formatte notre future requête SQL avec nos paramètres nommés
        $sql = 'INSERT INTO `app_user` (name) VALUES (:name)';

        // 1. On prépare notre requête
        $query = $pdo->prepare($sql);

        // 2. On exécute la requête SQL en lui transmettant des valeurs pour les paramètres nommés
        // execute retourne true si tout s'est passé et false sinon
        $success = $query->execute([
            ':name' => $this->name,
        ]);

        if ($success) {
            // Alors on récupère l'id auto-incrémenté généré par MySQL
            $this->id = $pdo->lastInsertId();

            // On retourne VRAI car l'ajout a parfaitement fonctionné
            return true;
            // => l'interpréteur PHP sort de cette fonction car on a retourné une donnée
        }

        // Si on arrive ici, c'est que quelque chose n'a pas bien fonctionné => FAUX
        return false;
    }

    public function update()
    {
        $pdo = Database::getPDO();

        $sql = 'UPDATE `app_user` SET name = :name WHERE id = :id';

        $query = $pdo->prepare($sql);

        $success = $query->execute([
            'name' => $this->name,
            'id' => $this->id,
        ]);

        return $success;
    }

    public function delete()
    {
        $pdo = Database::getPDO();

        $sql = 'DELETE FROM `app_user` WHERE id = :id';

        $query = $pdo->prepare($sql);

        $success = $query->execute([
            'id' => $this->id,
        ]);

        return $success;
    }

    public static function findByEmail($email)
    {
        // se connecter à la BDD
        $pdo = Database::getPDO();

        // écrire notre requête
        $sql = 'SELECT * FROM app_user WHERE email = :email';

        // exécuter notre requête
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->execute([
            ':email' => $email,
        ]);

        // un seul résultat => fetchObject
        $appUserEmail = $pdoStatement->fetchObject('App\Models\AppUser');

        // retourner le résultat
        return $appUserEmail;
    }
}
