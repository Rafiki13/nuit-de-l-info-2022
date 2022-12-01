<?php
namespace App\Ndi\Model\DataObject;

abstract class AbstractDataObject{
    public abstract function formatTableau(): array;

    public abstract function formatTableauPK(): array; /* retouen l'object au format tableua en précisant la clé primaire de la table */
}