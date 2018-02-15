<?php
/**
 * Created by PhpStorm.
 * User: Karudev
 * Date: 15/02/2018
 * Time: 19:36
 */

namespace AppBundle\EventListener;

use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class ResponseListener
{
    public function onKernelResponse(FilterResponseEvent $event)
    {
        $event->getResponse()->headers->set('Access-Control-Allow-Origin', '*');
    }
}

