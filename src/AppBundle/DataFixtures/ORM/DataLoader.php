<?php
/**
 * Created by PhpStorm.
 * User: Karudev
 * Date: 15/12/2017
 * Time: 00:57
 */

namespace AppBundle\DataFixtures\ORM;
use Hautelook\AliceBundle\Doctrine\DataFixtures\AbstractLoader;
class DataLoader extends AbstractLoader
{
    /**
     * {@inheritdoc}
     */
    public function getFixtures()
    {

            return [
                '@AppBundle/DataFixtures/ORM/brand.yml',
                '@AppBundle/DataFixtures/ORM/phone.yml',
            ];

    }
}
