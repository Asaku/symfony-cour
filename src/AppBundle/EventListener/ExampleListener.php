<?php
namespace AppBundle\EventListener;

use AppBundle\Entity\Category;
use Doctrine\ORM\Event\LifecycleEventArgs;

/**
 * Class ExampleListener
 * @package AppBundle\EventListener
 */
class ExampleListener
{
    /**
     * @param LifecycleEventArgs $args
     */
    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if (!$entity instanceof Category) {
            return;
        }

        $entityManager = $args->getEntityManager();
    }
}
