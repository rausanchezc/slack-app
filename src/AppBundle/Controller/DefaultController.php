<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $response = new JsonResponse();

        $message = 'Welcome to slack-app';
        $attachments = [
                'fallback' => '',
                'text' => 'I attached my saludation!'
        ];

        $responseData = [
            'response_type' => 'ephemeral',
            'attachments' => [json_encode($attachments)]
        ];

        $response->setStatusCode(Response::HTTP_OK);
        $response->setContent(json_encode($responseData));

        return $response;
    }
}
