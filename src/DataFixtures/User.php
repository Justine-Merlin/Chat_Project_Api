<?php

namespace App\DataFixtures;

use App\Entity\User as EntityUser;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class User extends Fixture
{
    protected $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        for ($i=0; $i < 30; $i++) { 
            if ($i == 0) {
                $user = new EntityUser();
                $user->setEmail("user$i@test");
                $passwordHash = $this->passwordHasher->hashPassword($user, 'testpassword');
                $user->setPassword($passwordHash);
                $user->setRoles(['role_admin']);
                $manager->persist($user);
            } else {
                $user = new EntityUser();
                $user->setEmail("user$i@test");
                $passwordHash = $this->passwordHasher->hashPassword($user, 'testpassword');
                $user->setPassword($passwordHash);
                $user->setRoles(['role_user']);
                $manager->persist($user);
            }

        }

        $manager->flush();
    }
}
