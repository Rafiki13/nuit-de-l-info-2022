<h1> Bestiaire</h1>
<p>Bienvenue aux bestiaires, ici se trouve toutes les différentes IST et maladies iojdfshfioh doifchv</p>
<div id="bestiaire">
    <h2>Celles présentes dans le jeu</h2>
    <div class="cardContainer">
        <?php
            require_once __DIR__ . '/../Model/dataObject/Ist.php';

            foreach(\App\Ndi\Model\DataObject\Ist::getInGame() as $ist){
                echo <<<HTML
                    <div class="card">
                        <div class="front">
                            <img src="{$ist->getCheminImage()}" alt="{$ist->getAltImage()}">
                            <div class="cardHead">
                                <h2>{$ist->getNom()}</h2>
                                <div class="dangerosite">
                                    {$ist->getNiveauDanger()}
                                </div>
                            </div>
                            <p class="type">{$ist->getType()}</p>
                        </div>
                        <div class="back">
                            <h2>Se protéger</h2>
                            <p>{$ist->getSeProteger()}</p>
                            <h2>Traitements</h2>
                            <p>{$ist->getTraitements()}</p>
                        </div>
                    </div>
                HTML;
            }
        ?>
    </div>
    <h2>Il en existe d'autres !</h2>
    <div class="cardContainer">
        <?php
        foreach(\App\Ndi\Model\DataObject\Ist::getNotInGame() as $ist){
            echo <<<HTML
                    <div class="card">
                        <div class="front">
                            <img src="{$ist->getCheminImage()}" alt="{$ist->getAltImage()}">
                            <div class="cardHead">
                                <h2>{$ist->getNom()}</h2>
                                <div class="dangerosite">
                                    {$ist->getNiveauDanger()}
                                </div>
                            </div>
                            <p class="type">{$ist->getType()}</p>
                        </div>
                        <div class="back">
                            <h2>Se protéger</h2>
                            <p>{$ist->getSeProteger()}</p>
                            <h2>Traitements</h2>
                            <p>{$ist->getTraitements()}</p>
                        </div>
                    </div>
                HTML;
        }
        ?>
    </div>
</div>