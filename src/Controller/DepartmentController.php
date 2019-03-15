<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 14/3/2019
 * Time: 6:46 μμ
 */

namespace App\Controller;


use App\Entity\DepartmentEmail;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DepartmentController extends AbstractController
{

    /**
     * @Route("/asas", name="local")
     */
    public function  generateEmail()
    {


        $sn = $this->getDoctrine()->getManager();

        $department = new DepartmentEmail();

        $department->setEmail("npapadimitriou1507@hotmail.com");
        $department->setNameDepartment("Direction");

        $repository = $this->getDoctrine()->getRepository(DepartmentEmail::class);

        $queredDepartment = $repository->findOneBy(['NameDepartment' => $department->getNameDepartment()]);
        dump($queredDepartment);

        if (!$queredDepartment) {
            $sn->persist($department);
            $sn->flush();
        }

        $department = new DepartmentEmail();
        $department->setEmail("npapadimitriou1507@gmail.com");
        $department->setNameDepartment("RH");

        $queredDepartment = $repository->findOneBy(['NameDepartment' => $department->getNameDepartment()]);
       // dump($queredDepartment);
        if (!$queredDepartment) {
            $sn->persist($department);
            $sn->flush();
        }


        return $this->redirectToRoute("contact");
    }

}