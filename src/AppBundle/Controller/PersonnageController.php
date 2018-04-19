<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Personnage;
use AppBundle\Entity\Race;
use AppBundle\Entity\User;
use AppBundle\Form\PersonnageType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class PersonnageController
 *
 * @package AppBundle\Controller
 */
class PersonnageController extends Controller
{
    /**
     * @Route("/personnages/add", name="personnage_add")
     */
    public function indexAction(Request $request)
    {
        $personnage = new Personnage();

//        $strengh = random_int(1, 100);
//        $life = random_int(80, 100);
//        $armor = random_int(1, 100);
//        $dexterity = random_int(1, 100);
//
//        $personnage->setStrengh($strengh);
//        $personnage->setLife($life);
//        $personnage->setArmor($armor);
//        $personnage->setDexterity($dexterity);

        $form = $this->createForm(PersonnageType::class, $personnage);
            if ($form->handleRequest($request)->isValid()) {
                $race = $this->getDoctrine()->getRepository(Race::class)->find($form['race']->getData());
                $user = $this->getUser();

                $personnage->setName($form['name']->getData());
                $personnage->setRace($race);
                $personnage->setStrengh($form['strengh']->getData() + $race->getStrengh());
                $personnage->setArmor($form['armor']->getData() + $race->getArmor());
                $personnage->setDexterity($form['dexterity']->getData() + $race->getDexterity());
                $personnage->setLife($form['life']->getData());

                $personnage->setUser($user);

                $em = $this->getDoctrine()->getManager();
                $em->persist($personnage);
                $em->flush();

                return $this->redirect($this->generateUrl('personnage_list'));
            }


        return $this->render('personnage/personnage_add.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/personnages/list", name="personnage_list")
     */
    public function listAction(Request $request)
    {
        $character = $this->getDoctrine()->getRepository(Personnage::class)->findBy(['user' => $this->getUser()]);

        return $this->render('personnage/personnage_list.html.twig',array('characters' => $character) );
    }
}
