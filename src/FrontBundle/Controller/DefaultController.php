<?php

namespace FrontBundle\Controller;

use FrontBundle\Form\TenantType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\Investor;
use Symfony\Component\HttpFoundation\RedirectResponse;
use UserBundle\Entity\Tenant;


class DefaultController extends Controller
{


    public function __construct()
    {
    }

    public function indexAction()
    {
        return $this->render('FrontBundle:Default:index.html.twig');
    }

    public function qsnAction()
    {
        return $this->render('FrontBundle:Default:qsn.html.twig');
    }

    public function contacterAction()
    {
        return $this->render('FrontBundle:Default:contact.html.twig');
    }

    public function tenantRegisterAction()
    {
        if (isset($_SESSION['user_register'])) {
            $tenant_id = $_SESSION['user_register_id_tenant'];
            $user_id = $_SESSION['user_register_id_user'];
            return $this->render('FrontBundle:Tenant:register.html.twig');
        }else{
            $url = $this->generateUrl('front_homepage');
            $response = new RedirectResponse($url);
            return $response;
        }
    }

    public function investorRegisterAction(Request $request)
    {

        if (isset($_SESSION['user_register'])) {
            $investor_id = $_SESSION['user_register_id_investor'];
            $user_id = $_SESSION['user_register_id_user'];

            if (isset($_FILES['cni']) && isset($_FILES['addressproof'])){
                $entityManager          = $this->getDoctrine()->getManager();
                $investor               = $entityManager->find(Investor::class, $investor_id);
                $cni                    = $_FILES['cni'];
                $addressProof           = $_FILES['addressproof'];
                $uploaded_cni           = new UploadedFile( $cni ['tmp_name'], $cni['name']);
                $uploaded_addressProof  = new UploadedFile( $addressProof['tmp_name'], $addressProof['name']);

                $fileName_cni           = 'CNI-'.$investor->getFirstname().'-'.$investor->getLastname().'-'.uniqid().'.'.$uploaded_cni->guessExtension();
                $fileName_addressProof  = 'ADDRESSPROOF-'.$investor->getFirstname().'-'.$investor->getLastname().'-'.uniqid().'.'.$uploaded_addressProof->guessExtension();

                try {
                    $uploaded_cni->move(
                        $this->getParameter('cni_directory'),
                        $fileName_cni
                    );
                    $uploaded_addressProof->move(
                        $this->getParameter('proofaddress_directory'),
                        $fileName_addressProof
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochure' property to store the PDF file name
                // instead of its contents
                $investor->setCni($fileName_cni);
                $investor->setAddressProof($fileName_addressProof);
                $entityManager->persist($investor);
                $entityManager->flush();
                return $this->render('FrontBundle:Investor:register-final.html.twig');
            }

            return $this->render('FrontBundle:Investor:register.html.twig');
        }else{
            $url = $this->generateUrl('front_homepage');
            $response = new RedirectResponse($url);
            return $response;
        }
    }

    public function tenantHomeAction(Request $request)
    {
        $id = $this->get('security.token_storage')->getToken()->getUser()->getTenant()->getId();

        $entityManager = $this->getDoctrine()->getManager();
        $tenant = $entityManager->getRepository(Tenant::class)->find($id);

        $form = $this->createForm(TenantType::class, $tenant);

        $paramGet = $request->files->get('tenant');

        $newParam = array();

        if (isset($paramGet)) {


            if (isset($paramGet['docPI']) && $paramGet['docPI'] instanceof UploadedFile ) {
                $newParam['docPI'] = $paramGet['docPI'];
            } else if ($tenant->getDocPI() != null){
                $newParam['docPI'] = $tenant->getDocPI();
                $file = substr(strrchr( $newParam['docPI'] , '/' ), 1);
                $newParam['docPI'] = new UploadedFile($newParam['docPI'], $file);
            }

            if (isset($paramGet['docReleveUn']) && $paramGet['docReleveUn'] instanceof UploadedFile ) {
                $newParam['docReleveUn'] = $paramGet['docReleveUn'];
            } else if ($tenant->getDocReleveUn() != null){
                $newParam['docReleveUn'] = $tenant->getDocReveleUn();
                $file = substr(strrchr( $newParam['docReleveUn'] , '/' ), 1);
                $newParam['docReleveUn'] = new UploadedFile($newParam['docReleveUn'], $file);
            }

            if (isset($paramGet['docReleveDeux']) && $paramGet['docReleveDeux'] instanceof UploadedFile ) {
                $newParam['docReleveDeux'] = $paramGet['docReleveDeux'];
            } else if ($tenant->getDocReleveDeux() != null){
                $newParam['docReleveDeux'] = $tenant->getDocReveleDeux();
                $file = substr(strrchr( $newParam['docReleveDeux'] , '/' ), 1);
                $newParam['docReleveDeux'] = new UploadedFile($newParam['docReleveDeux'], $file);
            }

            if (isset($paramGet['docReleveTrois']) && $paramGet['docReleveTrois'] instanceof UploadedFile ) {
                $newParam['docReleveTrois'] = $paramGet['docReleveTrois'];
            } else if ($tenant->getDocReleveTrois() != null){
                $newParam['docReleveTrois'] = $tenant->getDocReveleTrois();
                $file = substr(strrchr( $newParam['docReleveTrois'] , '/' ), 1);
                $newParam['docReleveTrois'] = new UploadedFile($newParam['docReleveTrois'], $file);
            }

            if (isset($paramGet['docJustifie']) && $paramGet['docJustifie'] instanceof UploadedFile) {
                $newParam['docJustifie'] = $paramGet['docJustifie'];
            } else if (!$paramGet['docJustifie'] instanceof UploadedFile && $tenant->getDocJustifie() != null) {
                $newParam['docJustifie'] = $tenant->getDocJustifie();
                $file = substr(strrchr( $newParam['docJustifie'] , '/' ), 1);
                $newParam['docJustifie'] = new UploadedFile($newParam['docJustifie'], $file);
            }

            $request->files->set('tenant', $newParam);
        }

        $form->handleRequest($request);
        $entityManager->persist($tenant);
        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->flush();

            return $this->redirect($this->generateUrl('front_tenant_homepage'));
        }

        $nbReleve = 0;
        $pjs = array();
        $pjs['docPI'] = preg_replace('/.+?(?=uploads)/','', $tenant->getDocPI());
        $pjs['docJustifie'] = preg_replace('/.+?(?=uploads)/','', $tenant->getDocJustifie());
        $pjs['docReleveUn'] = preg_replace('/.+?(?=uploads)/','', $tenant->getDocReleveUn());
        $pjs['docReleveDeux'] = preg_replace('/.+?(?=uploads)/','', $tenant->getDocReleveDeux());
        $pjs['docReleveTrois'] = preg_replace('/.+?(?=uploads)/','', $tenant->getDocReleveTrois());
        if ($tenant->getDocReleveUn() != null) { $nbReleve++;}
        if ($tenant->getDocReleveDeux() != null) { $nbReleve++;}
        if ($tenant->getDocReleveTrois() != null) { $nbReleve++;}
        return $this->render('FrontBundle:Tenant:index.html.twig', [
            'form' => $form->createView(),
            'releve' => $nbReleve,
            'pj' => $pjs
        ]);
    }

    public function tenantMapAction()
    {
        return $this->render('FrontBundle:Tenant:carte.html.twig');
    }

    public function investoreHomeAction()
    {
        return $this->render('FrontBundle:Investor:index.html.twig');
    }

    public function investorePortefeuillesHomeAction()
    {
        return $this->render('FrontBundle:Investor:portefeuilles.html.twig');
    }
}
