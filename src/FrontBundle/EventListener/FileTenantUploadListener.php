<?php
/**
 * Created by PhpStorm.
 * User: Banji
 * Date: 02/03/2019
 * Time: 00:19
 */

namespace FrontBundle\EventListener;


use FrontBundle\Service\FileUploader;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use UserBundle\Entity\Tenant;

class FileTenantUploadListener
{
    private $uploader;

    public function __construct(FileUploader $uploader, $targetDirectory)
    {
        $this->uploader = $uploader;
        $this->targetDirectory = $targetDirectory;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $this->uploadFile($entity);
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();
        $this->uploadFile($entity);

    }

    private function uploadFile($entity)
    {
        // upload only works for Product entities
        if (!$entity instanceof Tenant) {
            return;
        }

        if ( $entity->getDocPI() != null && $entity->getDocPI()->getExtension() == "tmp") {
            $file = $entity->getDocPI();
            if ($file instanceof UploadedFile) {
                $fileName = $this->uploader->upload($file);
                $entity->setDocPI($this->targetDirectory.'/'.$fileName);
            } elseif ($file instanceof File) {
                $entity->setDocPI($file->getFilename());
            }
        }
        if ( $entity->getDocReleveUn() != null && $entity->getDocReleveUn()->getExtension() == "tmp") {
            $file = $entity->getDocReleveUn();
            if ($file instanceof UploadedFile) {
                $fileName = $this->uploader->upload($file);
                $entity->setDocReleveUn($this->targetDirectory.'/'.$fileName);
            } elseif ($file instanceof File) {
                $entity->setDocReleveUn($file->getFilename());
            }
        }
        if ( $entity->getDocReleveDeux() != null && $entity->getDocReleveDeux()->getExtension() == "tmp") {
            $file = $entity->getDocReleveDeux();
            if ($file instanceof UploadedFile) {
                $fileName = $this->uploader->upload($file);
                $entity->setDocReleveDeux($this->targetDirectory.'/'.$fileName);
            } elseif ($file instanceof File) {
                $entity->setDocReleveDeux($file->getFilename());
            }
        }
        if ( $entity->getDocReleveTrois() != null && $entity->getDocReleveTrois()->getExtension() == "tmp") {
            $file = $entity->getDocReleveTrois();
            if ($file instanceof UploadedFile) {
                $fileName = $this->uploader->upload($file);
                $entity->setDocReleveTrois($this->targetDirectory.'/'.$fileName);
            } elseif ($file instanceof File) {
                $entity->setDocReleveTrois($file->getFilename());
            }
        }
        if ( $entity->getDocJustifie() != null && $entity->getDocJustifie()->getExtension() == "tmp") {
            $file = $entity->getDocJustifie();
            if ($file instanceof UploadedFile) {
                $fileName = $this->uploader->upload($file);
                $entity->setDocJustifie($this->targetDirectory.'/'.$fileName);
            } elseif ($file instanceof File) {
                $entity->setDocJustifie($file->getFilename());
            }
        }
    }

    public function postLoad(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity()->getTenant();

        if (!$entity instanceof Tenant) {
            return;
        }

        if ($fileName = $entity->getDocPI()) {
            $entity->setDocPI(new File($this->uploader->getTargetDirectory().'/'.$fileName));
        }
        if ($fileName = $entity->getDocReleveUn()) {
            $entity->setDocReleveUn(new File($this->uploader->getTargetDirectory().'/'.$fileName));
        }
    }
}