<?php

namespace App\DataFixtures;

use App\Entity\DepartmentEmail;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();


        $department=new DepartmentEmail();
        $department->setNameDepartment("Direction");
        $department->setEmail("npapadimitriou1507@hotmail.com");
        $manager->persist($department);

        $department=new DepartmentEmail();
        $department->setNameDepartment("RH");
        $department->setEmail("npapadimitriou1507@gmail.com");
        $manager->persist($department);

        $department=new DepartmentEmail();
        $department->setNameDepartment("DEV");
        $department->setEmail("npapadimitriou1507@gmail.com");
        $manager->persist($department);

        $manager->flush();
    }
}
