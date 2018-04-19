<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Personnage;
use AppBundle\Entity\Race;
use AppBundle\Form\PersonnageType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class GameController
 *
 * @package AppBundle\Controller
 */
class GameController extends Controller
{
    /**
     * @Route("/game/prepare", name="game_prepare")
     */
    public function indexAction(Request $request)
    {
        $character = $this->getDoctrine()->getRepository(Personnage::class)->findBy(['user' => $this->getUser()]);
        $opponents = $this->getDoctrine()->getRepository(Personnage::class)->findAll();

        return $this->render('game/game_prepare.html.twig', array('characters' => $character, 'opponents' => $opponents));
    }

    /**
     * @Route("/game/play", name="game_play")
     */
    public function battleAction(Request $request)
    {
        $character = $request->get('character');
        $opponent = $request->get('opponent');

        if($character == null || $opponent == null)
            return $this->redirect($this->generateUrl('game_prepare'));

        return $this->render('game/game_play.html.twig', array(
            'character' => $character,
            'opponent' => $opponent
        ));
    }

}
