<?php
namespace App\Ndi\Model\DataObject;

// niveau de dangerosité de l'IST
enum Niveaudanger{
    case Faible;
    case Moyen;
    case Eleve;
}

enum TypeIst: string{
    case Virus = "Virus";
    case Bacterie = "Bactérie";
    case Champis = "Microchampignons";
    case Insecte = "Insecte";
    case EasterEgg = "Easter Egg";
}

class Ist{
    private string $nom;
    private string $nomImage;
    private string $altImage;
    private Niveaudanger $niveauDanger;
    private TypeIst $type;
    private array $seProteger;
    private array $traitements;

    /**
     * @param string $nom
     * @param string $nomImage
     * @param string $altImage
     * @param Niveaudanger $niveauDanger
     * @param TypeIst $type
     * @param string $seProteger
     * @param string $traitements
     */
    public function __construct(string $nom, string $nomImage, string $altImage, Niveaudanger $niveauDanger, TypeIst $type, array $seProteger, array $traitements)
    {
        $this->nom = $nom;
        $this->nomImage = $nomImage;
        $this->altImage = $altImage;
        $this->niveauDanger = $niveauDanger;
        $this->type = $type;
        $this->seProteger = $seProteger;
        $this->traitements = $traitements;
    }


    public static function getInGame(): array{
        $liste = [];

        $liste[] = new Ist(
            "VIH",
            "BOSS_FINAL_VIH_HD.png",
            "VIH",
            Niveaudanger::Eleve,
            TypeIst::Virus,
            ["Utilisation du préservatif", "Éviter tout contact avec du sang en cas de blessure", "Utilisation d'un traitement (la PrEP)"],
            ["Traitements post-expositions antirétroviraux"]
        );
        $liste[] = new Ist(
            "Chlamydiae",
            "Chlamydiae_HD.png",
            "Chlamydiae",
            Niveaudanger::Moyen,
            TypeIst::Bacterie,
            ["Utilisation du préservatif", "Adopter une bonne hygiène intime"],
            ["Antibiotiques"]
        );
        $liste[] = new Ist(
            "Gonococcie",
            "Gonococcie_HD.png",
            "Gonococcie",
            Niveaudanger::Faible,
            TypeIst::Bacterie,
            ["Utilisation du préservatif"],
            ["Antibiotiques"]
        );
        $liste[] = new Ist(
            "Hepatite B",
            "Hepatite_B_HD.png",
            "Hepatite B",
            Niveaudanger::Eleve,
            TypeIst::Virus,
            ["Utilisation du préservatif", "Vaccination"],
            ["Antiviraux comprimés ou interféron par voie injectable en sous cutané"]
        );
        $liste[] = new Ist(
            "Herpes",
            "Herpes_HD.png",
            "Herpes",
            Niveaudanger::Faible,
            TypeIst::Virus,
            ["Utilisation du préservatif", "Éviter les rapports avec des personnes atteintes de lésions non guéries", "Digue dentaire"],
            ["Médicament antiviral (comprimés)", "Crèmes pour cicatrisation"]
        );
        $liste[] = new Ist(
            "Mycose",
            "Mycose_HD.png",
            "Mycose",
            Niveaudanger::Faible,
            TypeIst::Champis,
            ["Utilisation du préservatif", "Toilette intime", "Vêtements amples", "Sous-vêtements non synthétiques", "contraception faible en oestrogènes", "Prise de probiotiques vaginaux", "..."],
            ["Ovules antifongiques", "Crème", "Traitement entre partenaires sexuels"]
        );
        $liste[] = new Ist(
            "Papillomavirus",
            "Papillomavirus_HD.png",
            "Papillomavirus",
            Niveaudanger::Eleve,
            TypeIst::Virus,
            ["Utilisation du préservatif", "Vaccination", "Dépistage"],
            ["Crèmes", "Brûlées à l’azote ou au laser", "Extraction locale", "Colposcopie"]
        );
        $liste[] = new Ist(
            "Syphillis",
            "Syphillis_HD.png",
            "Syphillis",
            Niveaudanger::Eleve,
            TypeIst::Bacterie,
            ["Utilisation du préservatif", "Dépistage", "Traitements prescrits"],
            ["Antibiotiques", "Injection de pénicilline"]
        );

        return $liste;
    }

    public static function getNotInGame(): array{
        $liste = [];

        $liste[] = new Ist(
            "Morpion",
            "Morpion_HD.png",
            "Morpion",
            Niveaudanger::Faible,
            TypeIst::Insecte,
            ["Bonne hygiène intime", "Dépistage", "Éviter le partage ou l’essayage de sous vêtement", "Raser les poils pubiens en cas de morpions"],
            ["Produits d'hygiène médicamenteux", "Nettoyage des vêtements"]
        );
        $liste[] = new Ist(
            "Amogus",
            "AMOGUS.png",
            "Amogus",
            Niveaudanger::Eleve,
            TypeIst::EasterEgg,
            ["Ne lui faites pas confiance et ne restez pas seul avec lui"],
            ["L'expédier dans l’espace grâce à un vote collaboratif"]
        );

        return $liste;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @return string
     */
    public function getAltImage(): string
    {
        return $this->altImage;
    }

    /**
     * @return Niveaudanger
     */
    public function getNiveauDanger(): string
    {
        switch($this->niveauDanger){
            case Niveaudanger::Faible:
                return <<<HTML
                    <div class="active"></div>
                    <div></div>
                    <div></div>
                HTML;
            case Niveaudanger::Moyen:
                return <<<HTML
                    <div class="active"></div>
                    <div class="active"></div>
                    <div></div>
                HTML;
            case Niveaudanger::Eleve:
                return <<<HTML
                    <div class="active"></div>
                    <div class="active"></div>
                    <div class="active"></div>
                HTML;
        }
    }

    /**
     * @return TypeIst
     */
    public function getType(): string
    {
        return $this->type->value;
    }

    /**
     * @return string
     */
    public function getSeProteger(): array
    {
        return $this->seProteger;
    }

    /**
     * @return string
     */
    public function getTraitements(): array
    {
        return $this->traitements;
    }

    /**
     * @return string
     */
    public function getCheminImage(): string
    {
        return "assets/img/ist/" . $this->nomImage;
    }
}