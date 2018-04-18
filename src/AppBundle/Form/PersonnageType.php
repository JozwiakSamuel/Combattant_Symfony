<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class PersonnageType
 *
 * @package AppBundle\Form
 */
class PersonnageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add(
                'race',
                EntityType::class,
                array(
                    'class' => 'AppBundle:Race',
                    'choice_label' => 'name',
                    'multiple' => false,
                    'expanded' => false,
                )
            )
            ->add('strengh', IntegerType::class)
            ->add('life', IntegerType::class)
            ->add('armor', IntegerType::class)
            ->add('dexterity', IntegerType::class)
            ->add('save', SubmitType::class);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'AppBundle\Entity\Personnage',
            )
        );
    }

}
