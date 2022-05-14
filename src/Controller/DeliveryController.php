<?php

namespace App\Controller;

use App\Entity\Livraison;
use App\Form\LivraisonType;
use App\Repository\LivraisonRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DeliveryController extends AbstractController
{

    public function __construct(EntityManagerInterface $entityManager)
    {
       $this->entityManager = $entityManager;
    }
 
     /**
      * @Route("/admin/livraison", name="admin_livraison_home")
      * @param LivraisonRepository $livraisonrepository
      */
     public function home(LivraisonRepository $livraisonrepository): Response 
     {
        $livraison = $this->entityManager->getRepository(Livraison::class)->findAll();
       //  dd($accceuil);
 
         return $this->render('admin/livraison/index.html.twig', [
            "livraison" => $livraison
         ]);
     }


    /**
     * @Route("/admin/delivery/ajout", name="ajout_delivery")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $livraison = new Livraison();
        $form = $this->createForm(LivraisonType::class, $livraison);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->persist($livraison);
            $em->flush();

            return $this->redirectToRoute('admin_livraison_home');
        }
        return $this->render('admin/livraison/livraison.html.twig', [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/livraison/{id}/edit", name="modif_livraison")
     * @param Request $request
     * @return Response
     */
    public function edit(Livraison $livraison, ManagerRegistry $doctrine, Request $request): Response
    {
        
        $form = $this->createForm(LivraisonType::class, $livraison);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->persist($livraison);
            $em->flush();

            return $this->redirectToRoute('admin_livraison_home');
        }
        return $this->render('admin/livraison/editer.html.twig', [
            "form" => $form->createView()
        ]);
    }
}
