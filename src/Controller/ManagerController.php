<?php

namespace App\Controller;

use App\Entity\Vtc;
use App\Entity\Acceuil;
use App\Entity\Apropos;
use App\Entity\Contact;
use App\Entity\Livraison;
use App\Repository\AcceuilRepository;
use App\Repository\LivraisonRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ManagerController extends AbstractController
{

   private $entityManager;

   public function __construct(EntityManagerInterface $entityManager)
   {
      $this->entityManager = $entityManager;
   }

    /**
     * @Route("/", name="home")
     * @param AcceuilRepository $acceuilrepository
     */
    public function home(AcceuilRepository $acceuilrepository): Response 
    {
       $accceuil = $this->entityManager->getRepository(Acceuil::class)->findAll();
      //  dd($accceuil);
      $apropos = $this->entityManager->getRepository(Apropos::class)->findAll();
        return $this->render('index.html.twig', [
           "acceuils" => $accceuil,
           "apropos" => $apropos
        ]);
    }


    /**
     * @Route("/livraison", name="livraison_home")
     * @param LivraisonRepository $livraisonrepository
     */

     public function livraison_home(LivraisonRepository $livraisonrepository): Response 
     {
         $livraison = $this->entityManager->getRepository(Livraison::class)->findAll();
         //dd($livraison);
        return $this->render('livraison/index.html.twig', [
           "livraison" => $livraison
        ]);
     }


     /**
     * @Route("/vtc", name="vtc_home")
     */

    public function vtc_home(): Response 
    {
      $vtc = $this->entityManager->getRepository(Vtc::class)->findAll();
       return $this->render('vtc/index.html.twig', [
         "vtc" => $vtc
       ]);
    }


    /**
     * @Route("/contact", name="contact")
     */

    public function contact(): Response 
    {
      $contact = $this->entityManager->getRepository(Contact::class)->findAll();
       return $this->render('contact.html.twig', [
          "contact" => $contact
       ]);
    }   

    
    /**
    * @Route("/admin", name="admin")
   */
    public function admin(): Response
   {
      return $this->render('admin/index.html.twig');
   }


   /**
     * @Route("/gallery", name="galerie")
     */

    public function galerie(): Response 
    {
       return $this->render('gallery/index.html.twig');
    }   
}
