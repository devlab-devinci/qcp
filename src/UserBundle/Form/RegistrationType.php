<?php
// src/AppBundle/Form/RegistrationType.php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle', 'attr' => ['class' => 'form-control', 'placeholder' => 'Email']))
            ->add('username', null, array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle', 'attr' => ['class' => 'sf-username']))
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'options' => array(
                    'translation_domain' => 'FOSUserBundle',
                    'attr' => array(
                        'autocomplete' => 'new-password',
                        'class' => 'form-control'
                    ),
                ),
                'first_options' => array('label' => 'form.password'),
                'second_options' => array('label' => 'form.password_confirmation'),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
            //general
            ->add('lastname', null, array(
                "mapped" => false,
            ))
            ->add('firstname', null, array(
                "mapped" => false,
            ))
            ->add('birthday', null, array(
                "mapped" => false,
            ))
            ->add('type', null, array(
                "mapped" => false,
            ))
            //tenant
            ->add('relation', ChoiceType::class, array(
                "mapped" => false,
                "choices" => [
                    'Célibataire' => 0,
                    'Marié' => 1,
                    'Divorcé' => 2,
                    'Pacsé' => 3,
                    'Veuf' => 4
                ],
                'attr' => ['class' => 'custom-select my-1 mr-sm-2'],
                'required' => false
            ))
            ->add('status', ChoiceType::class, array(
                "mapped" => false,
                "choices" => [
                    'Étudiant' => 0,
                    'Salarié' => 1,
                    'Alternant, Contrat Pro...' => 2,
                    'Chômage' => 3,
                    'Autre...' => 4
                ],
                'attr' => ['class' => 'custom-select my-1 mr-sm-2'],
                'required' => false
            ))
            ->add('worktype', ChoiceType::class, array(
                "mapped" => false,
                "choices" => [
                    'CDD' => 0,
                    'CDI' => 1,
                    'Autre...' => 2
                ],
                'attr' => ['class' => 'custom-select my-1 mr-sm-2'],
                'required' => false
            ))
            ->add('child', ChoiceType::class, array(
                "mapped" => false,
                "choices" => [
                    '0' => 0,
                    '1' => 1,
                    '2 et plus' => 2
                ],
                'attr' => ['class' => 'custom-select my-1 mr-sm-2'],
                'required' => false
            ))
            ->add('bail', ChoiceType::class, array(
                "mapped" => false,
                "choices" => [
                    '0' => 0,
                    '1' => 1,
                    '2 et plus' => 2
                ],
                'attr' => ['class' => 'custom-select my-1 mr-sm-2']
            ))
            ->add('rent', NumberType::class, array(
                "mapped" => false,
                "scale" => 1,
                'required' => false
            ))
            ->add('qsp', ChoiceType::class, array(
                "mapped" => false,
                "choices" => [
                    'Un ami' => 0,
                    'Une exposition' => 1,
                    'Un site internet' => 2,
                    'Une recherche sur un moteur de recherche' => 3,
                    'Autre...' => 4
                ],
                'attr' => ['class' => 'custom-select my-1 mr-sm-2'],
                'required' => false
            ))
        ;
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}