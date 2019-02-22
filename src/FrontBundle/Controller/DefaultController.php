<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use UserBundle\Entity\Investor;
use Symfony\Component\HttpFoundation\RedirectResponse;


class DefaultController extends Controller
{


    public function __construct()
    {
    }

    public function indexAction()
    {
        return $this->render('FrontBundle:Default:index.html.twig');
    }

    public function faqAction()
    {
        return $this->render('FrontBundle:Default:faq.html.twig');
    }


    public function qsnAction()
    {
        return $this->render('FrontBundle:Default:qsn.html.twig');
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

    public function tenantHomeAction()
    {
        return $this->render('FrontBundle:Tenant:index.html.twig');
    }

    public function investoreHomeAction()
    {
        return $this->render('FrontBundle:Investor:index.html.twig');
    }
}
