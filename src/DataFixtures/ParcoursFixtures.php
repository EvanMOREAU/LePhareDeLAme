<?php

namespace App\DataFixtures;

use App\Entity\Parcour;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ParcoursFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Instanciation de Faker pour générer des données fictives
        $faker = Factory::create();

        // Création de 5 objets Parcour
        for ($i = 0; $i < 5; $i++) {
            $parcour = new Parcour();
            $parcour->setDate($faker->dateTimeBetween('-1 years', 'now'));
            $parcour->setTitle($faker->sentence(3));
            $parcour->setDescription($faker->paragraph(3));
            $parcour->setImg($faker->imageUrl(640, 480, 'nature', true, 'Faker')); // Image fictive

            // Persist l'entité dans le gestionnaire d'entités
            $manager->persist($parcour);
        }

        // Sauvegarde en base de données
        $manager->flush();
    }
}
