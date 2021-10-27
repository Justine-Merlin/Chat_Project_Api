<?php

namespace App\DataFixtures;

use App\Entity\Room as EntityRoom;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Room extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        for ($i=0; $i < 15; $i++) { 
            $room = new EntityRoom();
            $room->setName('discussion');
    
            $manager->persist($room);
        }


        $manager->flush();
    }
}
