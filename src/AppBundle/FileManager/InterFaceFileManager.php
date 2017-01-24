<?php

namespace AppBundle\FileManager;

/**
 * Created by PhpStorm.
 * User: formateur
 * Date: 24/01/2017
 * Time: 14:23
 */
interface InterFaceFileManager
{
    /**
     * @param array $files
     * @param string $folderName
     * @return mixed
     */
    public function upload(array $files, $folderName);
}
