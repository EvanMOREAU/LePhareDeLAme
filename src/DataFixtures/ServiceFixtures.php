<?php

namespace App\DataFixtures;

use App\Entity\Type;
use App\Entity\Service;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ServiceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $category1 = new Type;
        $category1->setType('Magnétisme');

        $category2 = new Type;
        $category2->setType('Soin Energétique');
        
        $category3 = new Type;
        $category3->setType('Hypnose');

        $service1 = new Service;
        $service1->setName('Hypnose Holistique');
        $service1->setType($category3);
         $service1->setImg('Hypnose-regressive-2-65c4c30a0ab38.png');
        $service1->setDescription('A changer');
        $service1->setPrice(29.99);
        
        $service2 = new Service;
        $service2->setName('Hypnose Régressive');
        $service2->setType($category3);
         $service2->setImg('Hypnose-regressive-2-65c4c30a0ab38.png');
        $service2->setDescription('A changer');
        $service2->setPrice(29.99);
        
        $service3 = new Service;
        $service3->setName('Hypnose Spirituelle');
        $service3->setType($category3);
         $service3->setImg('Hypnose-regressive-2-65c4c30a0ab38.png');
        $service3->setDescription('A changer');
        $service3->setPrice(29.99);
        
        $service4 = new Service;
        $service4->setName('Perle Noire');
        $service4->setType($category2);
         $service4->setImg('Hypnose-regressive-2-65c4c30a0ab38.png');
        $service4->setDescription('A changer');
        $service4->setPrice(29.99);
        
        $service5 = new Service;
        $service5->setName('Lahochi');
        $service5->setType($category2);
         $service5->setImg('Hypnose-regressive-2-65c4c30a0ab38.png');
        $service5->setDescription('A changer');
        $service5->setPrice(29.99);
        
        $service6 = new Service;
        $service6->setName('Lahochi 13ème octave');
        $service6->setType($category2);
         $service6->setImg('Hypnose-regressive-2-65c4c30a0ab38.png');
        $service6->setDescription('A changer');
        $service6->setPrice(29.99);
        
        $service7 = new Service;
        $service7->setName('Séance de magnétisme');
        $service7->setType($category1);
         $service7->setImg('Hypnose-regressive-2-65c4c30a0ab38.png');
        $service7->setDescription('A changer');
        $service7->setPrice(29.99);
        
        $service8 = new Service;
        $service8->setName('Nettoyage énergétique');
        $service8->setType($category1);
         $service8->setImg('Hypnose-regressive-2-65c4c30a0ab38.png');
        $service8->setDescription('A changer');
        $service8->setPrice(29.99);
         
        $manager->persist($category1);
        $manager->persist($category2);
        $manager->persist($category3);

        $manager->persist($service1);
        $manager->persist($service2);
        $manager->persist($service3);
        $manager->persist($service4);
        $manager->persist($service5);
        $manager->persist($service6);
        $manager->persist($service7);
        $manager->persist($service8);
        $manager->flush();
    }
}
