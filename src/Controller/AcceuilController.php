<?php

namespace App\Controller;

use App\Entity\Acceuil;
use App\Form\AcceuilType;
use App\Repository\AcceuilRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AcceuilController extends AbstractController
{

    public function __construct(EntityManagerInterface $entityManager)
   {
      $this->entityManager = $entityManager;
   }

    /**
     * @Route("/admin/acceuil", name="admin_acceuil_home")
     * @param AcceuilRepository $acceuilrepository
     */
    public function home(AcceuilRepository $acceuilrepository): Response 
    {
       $accceuil = $this->entityManager->getRepository(Acceuil::class)->findAll();
      //  dd($accceuil);

        return $this->render('admin/acceuil/index.html.twig', [
           "acceuils" => $accceuil
        ]);
    }



    /**
     * @Route("/admin/acceuil/ajout", name="ajout_acceuil")
     * @param Request $request
     * @return Response
     */
    public function ajout(ManagerRegistry $doctrine, Request $request): Response
    {
        $acceuil = new Acceuil();
        $form = $this->createForm(AcceuilType::class, $acceuil);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->persist($acceuil);
            $em->flush();

            return $this->redirectToRoute('admin_acceuil_home');
        }
        return $this->render('admin/acceuil/ajouter.html.twig', [
            "form" => $form->createView()
        ]);
    }



    /**
     * @Route("/admin/acceuil/{id}/edit", name="modif_acceuil")
     * @param Request $request
     * @return Response
     */
    public function edit(Acceuil $acceuil, ManagerRegistry $doctrine, Request $request): Response
    {
        
        $form = $this->createForm(AcceuilType::class, $acceuil);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->persist($acceuil);
            $em->flush();

            return $this->redirectToRoute('admin_acceuil_home');
        }
        return $this->render('admin/acceuil/editer.html.twig', [
            "form" => $form->createView()
        ]);
    }
}
