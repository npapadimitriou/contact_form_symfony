<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 12/3/2019
 * Time: 5:48 μμ
 */

namespace App\Controller;


use App\Entity\DepartmentEmail;
use App\Entity\Usercredentials;
use App\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class FirstController extends AbstractController
{
    /**
     * @Route("/contact",name="contact")
     */

    public function contactcontroller(Request $request,\Swift_Mailer $mailer)
    {

        //$depar=new DepartmentController();
       // $depar->generateEmail();

        $form=$this->createForm(ContactType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $contactFormData = $form->getData();

            $contact=new Usercredentials();
            $contact->setEmail($contactFormData['email']);
            $contact->setName($contactFormData['prenom']);
            $contact->setSurname($contactFormData['nom']);
            $contact->setMessage($contactFormData['message']);

            $sn = $this->getDoctrine()->getManager();
            $sn -> persist($contact);
            $sn -> flush();




            $message = (new \Swift_Message('New user added'))
                ->setFrom('npapadimitriou1507@gmail.com')
                ->setTo('npapadimitriou1507@hotmail.com')
                ->setBody(
                    $this->render('email/newUserEmail.html.twig',array('name'=>$contactFormData['prenom'],
                        'surname'=>$contactFormData['nom'],'emailAddress'=>$contactFormData['email'],
                        'message'=>$contactFormData['message'])),'text/plain');


            $mailer->send($message);
            return $this->redirectToRoute('contact');

                  }

/*

*/
  return $this->render('Contact/contform.html.twig',[
      'our_form' => $form->createView(),
  ]);



    }


}