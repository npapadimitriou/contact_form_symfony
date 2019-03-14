<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 14/3/2019
 * Time: 6:46 μμ
 */

namespace App\Controller;


use App\Entity\DepartmentEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DepartmentController extends AbstractController
{

    public function  generateEmail()
    {

    $department=new DepartmentEmail();
    $sn = $this->getDoctrine()->getManager();

    $department->setEmail("npapadimitriou1507@hotmail.com");
    $department->setNameDepartment("Direction");
    $sn -> persist($department);
    $sn -> flush();

    $department->setEmail("npapadimitriou1507@gmail.com");
    $department->setNameDepartment("RH");
    $sn -> persist($department);
    $sn -> flush();

    }

}