<?php
namespace UserBundle\Admin;

use FOS\UserBundle\Model\UserManager;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;



class TenantAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('user.username', TextType::class);
        $formMapper->add('user.email', TextType::class);
        $formMapper->add('statusTenant', 'choice', [
            'choices' => [
                'Inscrit'               => '0',
                'Non validé'            => '1',
                'Validé sans logement'  => '2',
                'Validé avec logement'  => '3',
        ],]);
        $formMapper->add('projet', null);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('user.username');
        $datagridMapper->add('statusTenant');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('user.username');
        $listMapper->addIdentifier('statusTenant');
    }
}