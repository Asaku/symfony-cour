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

    public function transformationChien()
    {
        return 'chien';
    }

    public function getName()
    {
        return 'app_extension';
    }
}
