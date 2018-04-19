<?php
/**
 * Created by PhpStorm.
 * User: pictime
 * Date: 19/04/18
 * Time: 17:07
 */

namespace AppBundle\Service;

use \AppBundle\Entity\Personnage;

class GameService {

    /**
     * Permet d'affliger le coup donné par un personnage sur un autre.
     * @param Personnage $character1 Attaquant
     * @param Personnage $character2 Cible
     */
    public function hit(Personnage $character1, Personnage $character2) {
        $attack = random_int(0, 100);
        if($attack > ($character2->getDexterity() / 2))
            $character2->setLife($character2->getLife() - $character1->getStrengh());
    }

    /**
     * Permet de vérifier si un personnage est mort.
     * @param Personnage $character
     * @return bool True si il est mort, false sinon.
     */
    public function isDead(Personnage $character) {
        return $character->getLife() <= 0;
    }
}