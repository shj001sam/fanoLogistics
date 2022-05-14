<?php

namespace App\Controller;

use App\Entity\Vtc;
use App\Form\VtcType;
use App\Repository\VtcRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PcdController extends AbstractController
{

    public function __construct(EntityManagerInterface $entityManager)
    {
       $this->entityManager = $entityManager;
    }
 
     /**
      * @Route("/admin/vtc", name="admin_vtc_home")
      * @param VtcRepository $acceuilrepository
      */
     public function home(VtcRepository $vtcrepository): Response 
     {
        $vtc = $this->entityManager->getRepository(Vtc::class)->findAll();
       //  dd($accceuil);
 
         return $this->render('admin/vtc/index.html.twig', [
            "vtc" => $vtc
         ]);
     }




    /**
     * @Route("/admin/vtc", name="app_pcd")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $vtc = new Vtc();
        $form = $this->createForm(VtcType::class, $vtc);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->persist($vtc);
            $em->flush();

            return $this->redirectToRoute('app_pcd');
        }
        return $this->render('admin/vtc.html.twig', [
            "form" => $form->createView()
        ]);
    }


    /**
     * @Route("/admin/vtc/{id}/edit", name="modif_vtc")
     * @param Request $request
     * @return Response
     */
    public function edit(Vtc $vtc, ManagerRegistry $doctrine, Request $request): Response
    {
        
        $form = $this->createForm(VtcType::class, $vtc);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->persist($vtc);
            $em->flush();

            return $this->redirectToRoute('admin_vtc_home');
        }
        return $this->render('admin/vtc/editer.html.twig', [
            "form" => $form->createView()
        ]);
    }
}
