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

        $attachments = [
            [
                'fallback' => '',
                'title' => 'Title',
                'title_link' => 'http://www.trivago.com',
                'text' => 'Attachment message'
            ]
        ];

        $responseData = [
            'response_type' => 'ephemeral',
            'text' => 'I\'m saying hello!',
            'attachments' => [json_encode($attachments)]
        ];

        $response->setStatusCode(Response::HTTP_OK);
        $response->setContent(json_encode($responseData));

        return $response;
    }
}
