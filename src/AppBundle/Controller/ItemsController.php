<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;

class ItemsController extends Controller
{
    /**
     * Card renderer
     * @param int $id
     * @return Response
     */
    public function cardAction($id)
    {
        $repository = $this->get('doctrine')->getRepository('AppBundle:Items\Card');
        $item = $repository->findOneById($id);

        if ($item === null) {
            throw new NotFoundHttpException('Card not found.');
        }

        return $this->render(
            'AppBundle:Items:card.html.twig',
            array(
                'item' => $item
            )
        );
    }
    /**
     * Board renderer
     * @param int $id
     * @return Response
     */
    public function boardAction($id)
    {
        $repository = $this->get('doctrine')->getRepository('AppBundle:Board');
        $item = $repository->findOneById($id);

        if ($item === null) {
            throw new NotFoundHttpException('Board not found.');
        }

        return $this->render(
            'AppBundle:Items:board.html.twig',
            array(
                'item' => $item
            )
        );
    }
}
