<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Personnage;
use AppBundle\Entity\Race;
use AppBundle\Form\PersonnageType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class PersonnageController
 *
 * @package AppBundle\Controller
 */
class PlayController extends Controller
{
    /**
     * @Route("/play/choose", name="adversaire_choice")
     */
    public function indexAction(Request $request)
    {
        $character = $this->getDoctrine()->getRepository(Personnage::class)->findBy(['user' => $this->getUser()]);
        $opponents = $this->getDoctrine()->getRepository(Personnage::class)->findBy(['user' => null]);

        return $this->render('jeux/adversaire_choice.html.twig', array('characters' => $character, 'opponents' => $opponents));
    }

    /**
     * @Route("/play/battle", name="battle_game")
     */
    public function BattleAction(Request $request)
    {
        return $this->render('jeux/battle_game.html.twig');
    }

}
