<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 22/02/2019
 * Time: 00:16
 */

namespace UserBundle\Form;

use UserBundle\Entity\Investor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class DocumentType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cni', FileType::class, ['label' => 'Une pièce d\'identité (format PDF)'])
            ->add('addressProof', FileType::class, ['label' => 'Justificatif de domicile (format PDF)'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Investor::class,
        ]);
    }
}