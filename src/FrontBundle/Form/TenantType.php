<?php
/**
 * Created by PhpStorm.
 * User: Banji
 * Date: 28/02/2019
 * Time: 20:19
 */

namespace FrontBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use UserBundle\Entity\Tenant;

class TenantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('docPI', FileType::class,
                array('data_class' => null, 'required' => false, 'label' => 'Pièce d\'identité'))
            ->add('docReleveUn', FileType::class,
                array('data_class' => null, 'required' => false, 'label' => 'Relevé un'))
            ->add('docReleveDeux', FileType::class,
                array('data_class' => null, 'required' => false, 'label' => 'Relvevé deux'))
            ->add('docReleveTrois', FileType::class,
                array('data_class' => null, 'required' => false, 'label' => 'Relvevé trois'))
            ->add('docJustifie', FileType::class,
                array('data_class' => null, 'required' => false, 'label' => 'Justificatif de revenus'))
            ->add('save', SubmitType::class, ['label' => 'Envoyer un nouveau document'])
            ->add('save2', SubmitType::class, ['label' => 'Envoyer un nouveau document'])
            ->add('save3', SubmitType::class, ['label' => 'Envoyer un nouveau document'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tenant::class,
        ]);
    }
}