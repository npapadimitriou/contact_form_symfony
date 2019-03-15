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
     * @Route("/",name="contact")
     */

    public function contactcontroller(Request $request,\Swift_Mailer $mailer)
    {


        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $contactFormData = $form->getData();

            $contact = new Usercredentials();
            $contact->setEmail($contactFormData['email']);
            $contact->setName($contactFormData['prenom']);
            $contact->setSurname($contactFormData['nom']);
            $contact->setMessage($contactFormData['message']);
            $contact->setDepartment($contactFormData['Department']);

            $sn = $this->getDoctrine()->getManager();
            $sn->persist($contact);
            $sn->flush();

            dump($contact->getDepartment()->getEmail());
            $repository = $this->getDoctrine()->getRepository(DepartmentEmail::class);



            $this->sendemail($contact,$mailer);
            return $this->redirectToRoute('contact');
        }

        return $this->render('Contact/contform.html.twig', [
            'our_form' => $form->createView(),
        ]);


    }


    function sendemail($contact, $mailer)
    {

        $message = (new \Swift_Message('New user added'))
            ->setFrom('npapadimitriou1507@gmail.com')
            ->setTo($contact->getDepartment()->getEmail())
            ->setBody(
                $this->render('email/newUserEmail.html.twig', array('name' =>$contact->getName(),
                    'surname' => $contact->getSurname(), 'emailAddress' => $contact->getEmail(),
                    'message' => $contact->getMessage())), 'text/plain');

        $mailer->send($message);

    }
}