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
}

class Ist{
    private string $nom;
    private string $nomImage;
    private string $altImage;
    private Niveaudanger $niveauDanger;
    private TypeIst $type;
    private string $seProteger;
    private string $traitements;

    /**
     * @param string $nom
     * @param string $nomImage
     * @param string $altImage
     * @param Niveaudanger $niveauDanger
     * @param TypeIst $type
     * @param string $seProteger
     * @param string $traitements
     */
    public function __construct(string $nom, string $nomImage, string $altImage, Niveaudanger $niveauDanger, TypeIst $type, string $seProteger, string $traitements)
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
            "BOSS FINAL VIH HD.png",
            "VIH",
            Niveaudanger::Eleve,
            TypeIst::Virus,
            "",
            "desc traitements"
        );
        $liste[] = new Ist(
            "Chlamydiae",
            "Chlamydiae HD.png",
            "Chlamydiae",
            Niveaudanger::Moyen,
            TypeIst::Bacterie,
            "",
            "desc traitements"
        );
        $liste[] = new Ist(
            "Gonococcie",
            "Gonococcie HD.png",
            "Gonococcie",
            Niveaudanger::Faible,
            TypeIst::Bacterie,
            "",
            "desc traitements"
        );
        $liste[] = new Ist(
            "Hepatite B",
            "Hepatite B HD.png",
            "Hepatite B",
            Niveaudanger::Eleve,
            TypeIst::Virus,
            "",
            "desc traitements"
        );
        $liste[] = new Ist(
            "Herpes",
            "Herpes HD.png",
            "Herpes",
            Niveaudanger::Faible,
            TypeIst::Virus,
            "",
            "desc traitements"
        );
        $liste[] = new Ist(
            "Mycose",
            "Mycose HD.png",
            "Mycose",
            Niveaudanger::Faible,
            TypeIst::Champis,
            "",
            "desc traitements"
        );
        $liste[] = new Ist(
            "Papillomavirus",
            "Papillomavirus HD.png",
            "Papillomavirus",
            Niveaudanger::Eleve,
            TypeIst::Virus,
            "",
            "desc traitements"
        );
        $liste[] = new Ist(
            "Syphillis",
            "Syphillis HD.png",
            "Syphillis",
            Niveaudanger::Eleve,
            TypeIst::Bacterie,
            "",
            "desc traitements"
        );

        return $liste;
    }

    public static function getNotInGame(): array{
        $liste = [];

        $liste[] = new Ist(
            "uwu",
            "carteprovi.png",
            "alt de l'image",
            Niveaudanger::Eleve,
            TypeIst::Virus,
            "desc se protéger",
            "desc traitements"
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
    public function getSeProteger(): string
    {
        return $this->seProteger;
    }

    /**
     * @return string
     */
    public function getTraitements(): string
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