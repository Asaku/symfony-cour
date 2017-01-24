<?php
namespace AppBundle\FileManager;
use AppBundle\Entity\Upload;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Created by PhpStorm.
 * User: formateur
 * Date: 24/01/2017
 * Time: 14:22
 */
class FileManagerImage implements InterFaceFileManager
{
    /**
     * @param array $files
     * @param string $folderName
     */
    public function upload(array $files = array(), $folderName)
    {
        $fileCollections = new ArrayCollection();
        $dir = 'uploads/'.$folderName;

        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }
        foreach ($files as $file) {
            if ($file) {
                $fileName = md5(uniqid()).'.'.$file->guessExtension();
                $file->move(
                    $dir,
                    $fileName
                );

                $upload = new Upload();
                $upload->setPath($dir.'/'.$fileName);
                $fileCollections->add($upload);
            }
        }

        return $fileCollections;
    }
}
