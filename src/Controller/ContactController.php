<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ContactController extends AbstractController
{
    /**
     * Send mail
     *
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param MailerInterface $mailer
     * @return Response
     */
    #[Route('/', name:'home', methods:['GET','POST'])]
    #[Route('/#section_contact', name:'home__contact', methods:['GET','POST'])]
    public function contact(Request $request, EntityManagerInterface $em, MailerInterface $mailer): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            
            $contact = $form->getData();
            $em->persist($contact);
            $em->flush();

            $email = (new TemplatedEmail())
            ->from($contact->getEmail())
            ->to('julien_cristovao@hotmail.com')
            ->subject('Demande devis'.$contact->getNom())
            ->htmlTemplate('email/email.html.twig')
            ->context([
                'contact' => $contact
            ]);
            $mailer->send($email);
            $this->addFlash('success', 'Message envoyé avec succès!');
            return $this->redirectToRoute('home__contact');
        }
        if ($form->isSubmitted() && !$form->isValid()) 
        {
            $this->addFlash('error', 'L\'envoie du message à echoué');
            return $this->redirectToRoute('home__contact');

        }
                


        return $this->render('base.html.twig', [
            'form' => $form->createView()
        ]);
    }
}