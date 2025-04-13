<?php

namespace App\Controller;

use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ApiTestController extends AbstractController
{
    #[Route('/api/test', name: 'app_api_test')]
    public function test(SerializerInterface $serializer): Response
    {
        $data = ['message' => 'Hello, JMS Serializer!'];
        $json = $serializer->serialize($data, 'json');

        return new Response($json, 200, ['Content-Type' => 'application/json']);
    }
}
