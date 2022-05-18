<?php

namespace App\Controller;

use App\Entity\Image;
use App\Entity\Video;
use App\Form\ImageType;
use App\Form\VideoType;
use App\Repository\ImageRepository;
use App\Repository\VideoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GalleryController extends AbstractController
{

    public function __construct(EntityManagerInterface $entityManager)
    {
       $this->entityManager = $entityManager;
    }
    
    /**
     * @Route("/admin/galerie", name="admin_galerie_home")
     * @param galerieRepository $galerierepository
     */
    public function home(ImageRepository $imagerepository, VideoRepository $videorepository): Response 
    {
       $image = $this->entityManager->getRepository(Image::class)->findAll();
       $video = $this->entityManager->getRepository(Video::class)->findAll();
      //  dd($accceuil);

        return $this->render('admin/galerie/index.html.twig', [
           "images" => $image,
           "videos" => $video
        ]);
    }



    /**
     * @Route("/admin/galerie/ajout", name="ajout_galerie")
     * @param Request $request
     * @return Response
     */
    public function ajout(ManagerRegistry $doctrine, Request $request): Response
    {
        $image = new Image();
        $form = $this->createForm(ImageType::class, $image);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->persist($image);
            $em->flush();

        }

        $video = new Video();
        $form1 = $this->createForm(VideoType::class, $video);
        $form1->handleRequest($request);
        if ($form1->isSubmitted() && $form1->isValid()) {
            $em = $doctrine->getManager();
            $em->persist($video);
            $em->flush();

        }

        return $this->render('admin/galerie/ajouter.html.twig', [
            "form" => $form->createView(),
            "form1" => $form1->createView()
        ]);
    }



    /**
     * @Route("/admin/galerie/{id}/edit", name="modif_galerie")
     * @param Request $request
     * @return Response
     */
    public function edit(Image $image, Video $video, ManagerRegistry $doctrine, Request $request): Response
    {
        
        $form = $this->createForm(ImageType::class, $image);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->persist($image);
            $em->flush();

        }

        $video = new Video();
        $form1 = $this->createForm(VideoType::class, $video);
        $form1->handleRequest($request);
        if ($form1->isSubmitted() && $form1->isValid()) {
            $em = $doctrine->getManager();
            $em->persist($video);
            $em->flush();

        }

        return $this->render('admin/galerie/editer.html.twig', [
            "form" => $form->createView(),
            "form1" => $form1->createView()
        ]);
    }

    // /**
    //  * @Route("/gallery", name="app_gallery")
    //  */
    // public function index(): Response
    // {
    //     return $this->render('gallery/index.html.twig', [
    //         'controller_name' => 'GalleryController',
    //     ]);
    // }
}
