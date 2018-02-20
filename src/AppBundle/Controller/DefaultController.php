<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/test", name="homepage")
     */
    public function testAction(Request $request, EntityManagerInterface $em, UserPasswordEncoderInterface $encoder)
    {
        $apiCustomer = $em->getRepository("AppBundle:ApiCustomer")->findOneBy(['apiKey' => 'karudevapikey']);
        $user = new User();
        $user->setApiCustomer($apiCustomer)
            ->setUsername('karudev')
            ->setFirstname("Dolyveen")
            ->setLastname("Renault")
            ->setEmail("renault@karudev.fr")
            ->setPassword($encoder->encodePassword($user,"test"))
            ->setMobilePhone("06000000");
        $em->persist($user);
        $em->flush();

        return new JsonResponse();
    }
}
