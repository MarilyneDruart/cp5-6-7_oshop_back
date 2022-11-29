<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

/**
 * Un modèle représente une table (un entité) dans notre base
 *
 * Un objet issu de cette classe réprésente un enregistrement dans cette table
 */
class Brand extends CoreModel
{
    // Les propriétés représentent les champs
    // Attention il faut que les propriétés aient le même nom (précisément) que les colonnes de la table

    /**
     * @var string
     */
    private $name;

    /**
     * Méthode permettant de récupérer un enregistrement de la table Brand en fonction d'un id donné
     *
     * @param int $brandId ID de la marque
     * @return Brand
     */
    public static function find($brandId)
    {
        // se connecter à la BDD
        $pdo = Database::getPDO();

        // écrire notre requête
        $sql = 'SELECT * FROM brand WHERE id = :id';

        // exécuter notre requête
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->execute([
            ':id' => $brandId,
        ]);

        // un seul résultat => fetchObject
        $brand = $pdoStatement->fetchObject('App\Models\Brand');

        // retourner le résultat
        return $brand;
    }

    /**
     * Méthode permettant de récupérer tous les enregistrements de la table brand
     *
     * @return Brand[]
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `brand`';
        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\Brand');

        return $results;
    }

    public function insert()
    {
        $pdo = Database::getPDO();

        // On formatte notre future requête SQL avec nos paramètres nommés
        $sql = 'INSERT INTO brand (name) VALUES (:name)';

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

        $sql = 'UPDATE brand SET name = :name WHERE id = :id';

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

        $sql = 'DELETE FROM brand WHERE id = :id';

        $query = $pdo->prepare($sql);

        $success = $query->execute([
            'id' => $this->id,
        ]);

        return $success;
    }

    /**
     * Get the value of name
     *
     * @return  string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param  string  $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }
}
