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

    public function contactcontroller()
    {

        $form=$this->createForm(ContactType::class)
        $this->render('Contact/conform.html.twig',[
            'our_form' => $form->createView(),
        ])
    }


}