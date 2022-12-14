<h1 id="titleBestiaire">ISTdex</h1>
<p>
    Bienvenue sur l'ISTdex, vous retrouverez ici les différentes IST qui vous attaquent dans ISTower !
    Vous pouvez voir les stats de ces "créatures" sur notre jeu, mais aussi des données réelles, nottament sur les
    moyennes de s'en protéger ou encore les traitements que vous pouvez prendre si vous êtes contaminé.
</p>


<div id="pageBestiaire">
    <h2>Celles présentes dans le jeu</h2>
    <div class="cardContainer">
        <?php
            require_once __DIR__ . '/../Model/DataObject/Ist.php';

            foreach(\App\Ndi\Model\DataObject\Ist::getInGame() as $ist){
                $protection = "<ul>";
                foreach($ist->getSeProteger() as $p){
                    $protection .= "<li>$p</li>";
                }
                $protection.= "</ul>";

                $traitements = "<ul>";
                foreach($ist->getTraitements() as $p){
                    $traitements .= "<li>$p</li>";
                }
                $protection.= "</ul>";

                echo <<<HTML
                    <div class="card">
                        <div class="front">
                            <img src="{$ist->getCheminImage()}" alt="{$ist->getAltImage()}">
                            <div class="cardHead">
                                <h3>{$ist->getNom()}</h3>
                                <div class="dangerosite">
                                    {$ist->getNiveauDanger()}
                                </div>
                            </div>
                            <p class="type">{$ist->getType()}</p>
                        </div>
                        <div class="back">
                            <h3>Se protéger</h3>
                            {$protection}
                            <h3>Traitements</h3>
                            {$traitements}
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
            $protection = "<ul>";
            foreach($ist->getSeProteger() as $p){
                $protection .= "<li>$p</li>";
            }
            $protection.= "</ul>";

            $traitements = "<ul>";
            foreach($ist->getTraitements() as $p){
                $traitements .= "<li>$p</li>";
            }
            $protection.= "</ul>";

            echo <<<HTML
                    <div class="card">
                        <div class="front">
                            <img src="{$ist->getCheminImage()}" alt="{$ist->getAltImage()}">
                            <div class="cardHead">
                                <h3>{$ist->getNom()}</h3>
                                <div class="dangerosite">
                                    {$ist->getNiveauDanger()}
                                </div>
                            </div>
                            <p class="type">{$ist->getType()}</p>
                        </div>
                        <div class="back">
                            <h3>Se protéger</h3>
                            {$protection}
                            <h3>Traitements</h3>
                            {$traitements}
                        </div>
                    </div>
                HTML;
        }
        ?>
    </div>
</div>