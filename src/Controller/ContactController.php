<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Form\LivraisonType;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{

    public function __construct(EntityManagerInterface $entityManager)
    {
       $this->entityManager = $entityManager;
    }


    /**
      * @Route("/admin/contact", name="admin_contact_home")
      * @param ContactRepository $contactrepository
      */
      public function home(ContactRepository $contactrepository): Response 
      {
         $contact = $this->entityManager->getRepository(Contact::class)->findAll();
        //  dd($accceuil);
  
          return $this->render('admin/contact/index.html.twig', [
             "contact" => $contact
          ]);
      }
 


    /**
     * @Route("/admin/contact", name="app_contact")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->persist($contact);
            $em->flush();

            return $this->redirectToRoute('app_contact');
        }
        return $this->render('admin/contact.html.twig', [
            "form" => $form->createView()
        ]);
    }


    /**
     * @Route("/admin/contact/{id}/edit", name="modif_contact")
     * @param Request $request
     * @return Response
     */
    public function edit(Contact $contact, ManagerRegistry $doctrine, Request $request): Response
    {
        
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->persist($contact);
            $em->flush();

            return $this->redirectToRoute('admin_contact_home');
        }
        return $this->render('admin/contact/editer.html.twig', [
            "form" => $form->createView()
        ]);
    }
}
