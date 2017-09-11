<?php

namespace AppBundle\DataFixtures\ORM;

use Hautelook\AliceBundle\Doctrine\DataFixtures\AbstractLoader;

/**
 * Class DataLoader
 * @package AppBundle\DataFixtures\ORM
 */
class DataLoader extends AbstractLoader
{
    /**
     * {@inheritdoc}
     */
    public function getFixtures()
    {
        return [
            __DIR__.'/category.yml',
            __DIR__.'/post.yml',
            __DIR__.'/comment.yml',
        ];
    }
}
