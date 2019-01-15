<?php
namespace UserBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class InvestorAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('user.username', TextType::class);
        $formMapper->add('user.email', TextType::class);
        $formMapper->add('statusInvestor', 'choice', [
            'choices' => [
                'Inscrit'       => '0',
                'Non validé'    => '1',
                'Validé'        => '2',
        ],]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('user.username');
        $datagridMapper->add('statusInvestor');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('user.username');
        $listMapper->addIdentifier('statusInvestor');
    }
}