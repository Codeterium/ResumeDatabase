<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


use App\Entity\Company;
use App\Entity\Rezume;
use App\Entity\Reaction;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $companyRepo = $manager->getRepository(Company::class);
        $rezumeRepo = $manager->getRepository(Rezume::class);

        // create 20 
        for ($i = 1; $i < 20; $i++) {
            
            $company = new Company();
            $company->setName('Компания '.$i);
            $company->setSite('Сайт '.$i);
            $company->setAddress('Адрес '.$i);
            $company->setPhone('Телефон '.$i);

            $manager->persist($company);
        }        

        // create 10 
        for ($i = 1; $i < 10; $i++) {
            
            $rezume = new Rezume();
            $rezume->setPosition('Должность '.$i);
            $rezume->setFile(' ');
            $rezume->setText('Описание должности '.$i);

            $manager->persist($rezume);
        }        
        $manager->flush();

        
        // create 10 
        for ($i = 1; $i < 10; $i++) {
            
            $reaction = new Reaction();

            $comp = $companyRepo->findOneByName('Компания '.$i);
            if(count($comp)){
                $reaction->setCompany($comp);
            }

            $rezu = $rezumeRepo->findOneByPosition('Должность '.$i);
            if(count($rezu)){
                $reaction->setRezume($rezu);
            }

          

            $manager->persist($reaction);
        }        


        $manager->flush();
    }
}
