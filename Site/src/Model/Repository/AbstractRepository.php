<?php
namespace App\Ndi\Model\Repository;

use App\Ndi\Model\DatabaseConnection;
use App\Ndi\Model\DataObject\AbstractDataObject;

abstract class AbstractRepository{
    protected abstract function construire(array $objetFormatTableau): AbstractDataObject;

    protected abstract function getNomTable(): string;

    protected abstract function getNomClePrimaire(): string;

    protected abstract function getNomColonnes(): array;

    public function selectAll(): array{
        $sql = "SELECT * FROM " . $this->getNomTable();
        $pdoStatement = DatabaseConnection::getPdo()->query($sql);

        $liste = [];

        foreach ($pdoStatement as $item) {
            $liste[] = $this->construire($item);
        }

        return $liste;
    }

    public function select(string $valeurClePrimaire): ?AbstractDataObject{
        $sql = "SELECT * FROM {$this->getNomTable()} WHERE {$this->getNomClePrimaire()}=:valeurClePrimaire";
        // Préparation de la requête
        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);

        $values = array(
            "valeurClePrimaire" => $valeurClePrimaire,
            //nomdutag => valeur, ...
        );
        // On donne les valeurs et on exécute la requête
        $pdoStatement->execute($values);

        // On récupère les résultats comme précédemment
        // Note: fetch() renvoie false si pas de voiture correspondante
        $objet = $pdoStatement->fetch();

        if (!$objet) return null;

        return $this->construire($objet);
    }

    public function delete(string $valeurClePrimaire): bool{
        $sql = "DELETE FROM {$this->getNomTable()} WHERE {$this->getNomClePrimaire()}= :clePrimaire";

        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);

        try {
            $pdoStatement->execute(["clePrimaire" => $valeurClePrimaire]);
        } catch (PDOException $e) {
            return false;
        }

        return true;
    }

    public function update(AbstractDataObject $object): void{
        $sql = "UPDATE {$this->getNomTable()} SET ";
        foreach($this->getNomColonnes() as $colonne){
            $sql .= "$colonne = :$colonne, ";
        }
        if(count($this->getNomColonnes()) >= 1){
            $sql = substr($sql, 0, -2);
        }
        $sql .= " WHERE {$this->getNomClePrimaire()} = :clePrimaire;";

        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);

        $pdoStatement->execute($object->formatTableauPK());
    }

    public function create(AbstractDataObject $object): string{
        $sql = "INSERT INTO {$this->getNomTable()} VALUES(";
        foreach($this->getNomColonnes() as $colonne){
            $sql .= ":$colonne, ";
        }
        if(count($this->getNomColonnes()) >= 1){
            $sql = substr($sql, 0, -2);
        }
        $sql .= ");";

        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);

        try {
            $pdoStatement->execute($object->formatTableau());
            return true;
        } catch (Exception $error) {
            return false;
        }
    }
}