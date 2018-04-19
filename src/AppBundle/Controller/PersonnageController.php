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
class PersonnageController extends Controller
{
    /**
     * @Route("/personnages/add", name="personnage_add")
     */
    public function indexAction(Request $request)
    {
        $personnage = new Personnage();

        $personnage->setStrengh(random_int(1, 100));
        $personnage->setLife(random_int(80, 100));
        $personnage->setArmor(random_int(1, 100));
        $personnage->setDexterity(random_int(1, 100));


            $form = $this->createForm(PersonnageType::class, $personnage);
        if ($form->isSubmitted() && $form->handleRequest($request)->isValid()) {
            $personnage->setName($form['name']->getData());
            $race = $this->getDoctrine()->getRepository(Race::class)->find($form['race']->getData());
            $personnage->setRace($race);
            $personnage->setStrengh($personnage->getStrengh() + $race->getStrengh());
            $personnage->setArmor($personnage->getArmor() + $race->getArmor());
            $personnage->setDexterity($personnage->getDexterity() + $race->getDexterity());


            $em = $this->getDoctrine()->getManager();
            $em->persist($personnage);
            $em->flush();

            //            return $this->redirect($this->generateUrl('personnage_list'));
            return $this->redirect($this->generateUrl('mainpage'));
        }

        return $this->render('personnage/personnage_add.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'form' => $form->createView()
        ]);
    }
}
