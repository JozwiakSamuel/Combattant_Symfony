<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Personnage;
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
//            $personnage->setName($form['name']->getData());
//            $personnage->setStrengh($form['strengh']->getData());
//            $personnage->setLife($form['life']->getData());
//            $personnage->setArmor($form['armor']->getData());
//            $personnage->setDexterity($form['dexterity']->getData());
            $personnage->setRace($form['race']->getData());

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
