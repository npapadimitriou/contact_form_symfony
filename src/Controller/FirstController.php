<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 12/3/2019
 * Time: 5:48 μμ
 */

namespace App\Controller;


use App\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class FirstController extends AbstractController
{
    /**
     * @Route("/",name="contact")
     */

    public function contactcontroller(Request $request, \Swift_Mailer $mailer)
    {

        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $contactFormData = $form->getData();
            $sn = $this->getDoctrine()->getManager();
            $sn->persist($contactFormData);
            $sn->flush();
            $this->sendemail($contactFormData, $mailer);
            return $this->redirectToRoute('contact');
        }

        return $this->render('Contact/contform.html.twig', [
            'our_form' => $form->createView(),
        ]);


    }


    function sendemail($contactFormData, $mailer)
    {

        $message = (new \Swift_Message('New user added'))
            ->setFrom('npapadimitriou1507@gmail.com')
            ->setTo($contactFormData->getDepartment()->getEmail())
            ->setBody(
                $this->render('email/newUserEmail.html.twig', array('name' => $contactFormData->getName(),
                    'surname' => $contactFormData->getSurname(), 'emailAddress' => $contactFormData->getEmail(),
                    'message' => $contactFormData->getMessage())), 'text/plain');

        $mailer->send($message);

    }
}