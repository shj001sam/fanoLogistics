<?php

namespace App\Controller;

use App\Entity\Apropos;
use App\Form\AproposType;
use App\Repository\AproposRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AproposController extends AbstractController
{

    public function __construct(EntityManagerInterface $entityManager)
    {
       $this->entityManager = $entityManager;
    }
 
     /**
      * @Route("/admin/apropos", name="admin_apropos_home")
      * @param AproposRepository $acceuilrepository
      */
     public function home(AproposRepository $aproposrepository): Response 
     {
        $apropos = $this->entityManager->getRepository(Apropos::class)->findAll();
       //  dd($accceuil);
 
         return $this->render('admin/apropos/index.html.twig', [
            "apropos" => $apropos
         ]);
     }



    /**
     * @Route("/admin/apropos/ajout", name="ajout_apropos")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $apropos = new Apropos();
        $form = $this->createForm(AproposType::class, $apropos);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->persist($apropos);
            $em->flush();

            return $this->redirectToRoute('admin_apropos_home');
        }
        return $this->render('admin/apropos/ajouter.html.twig', [
            "form" => $form->createView()
        ]);
    }


    /**
     * @Route("/admin/apropos/{id}/edit", name="modif_apropos")
     * @param Request $request
     * @return Response
     */
    public function edit(Apropos $apropos, ManagerRegistry $doctrine, Request $request): Response
    {
        
        $form = $this->createForm(AproposType::class, $apropos);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->persist($apropos);
            $em->flush();

            return $this->redirectToRoute('admin_apropos_home');
        }
        return $this->render('admin/apropos/editer.html.twig', [
            "form" => $form->createView()
        ]);
    }

}
