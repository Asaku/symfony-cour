<?php
namespace AppBundle\EventListener;

use AppBundle\Entity\Category;
use Doctrine\ORM\Event\LifecycleEventArgs;

class ExampleListener
{
    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        // only act on some "Product" entity
        if (!$entity instanceof Category) {
            return;
        }
        
        $entityManager = $args->getEntityManager();
    }
}