<?php

namespace App\Controller;

use App\Entity\Message;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MessageController extends AbstractController
{

    public function __construct(EntityManagerInterface $entityManager)
    {
       $this->entityManager = $entityManager;
    }


    /**
     * @Route("/admin/message", name="app_message")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $message = new Message();
        $form = $this->createForm(MessageType::class, $message);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->persist($message);
            $em->flush();

            return $this->redirectToRoute('app_message');
        }
        return $this->render('admin/message.html.twig', [
            "form" => $form->createView()
        ]);
    }
}
