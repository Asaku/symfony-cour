<?php
namespace AppBundle\Twig;

class AppExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('transformationchien', array($this, 'transformationChien')),
        );
    }

    public function transformationChien($data)
    {
        die(dump($data));
        return 'chien';
    }

    public function getName()
    {
        return 'app_extension';
    }
}
