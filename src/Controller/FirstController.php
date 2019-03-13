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

class FirstController extends AbstractController
{
    /**
     * @Route("/")
     */

    public function contactcontroller(\Swift_Mailer $mailer)
    {

        $form=$this->createForm(ContactType::class);

        $contactFormData=$form->getData();



        $message = (new \Swift_Message('Hello Email'))
            ->setFrom($contactFormData['email'])
            ->setTo('npapadimitriou1507@hotmail.com')
            ->setBody(
                $contactFormData['message'],'text/plain'

            );

        $mailer->send($message);

  return $this->render('Contact/contform.html.twig',[
      'our_form' => $form->createView(),
  ]);



    }


}