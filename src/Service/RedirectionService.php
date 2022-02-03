<?php

namespace App\Service;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RedirectionService extends AbstractController
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getLevelId()
    {
        return $this->userRepository->findOneBy(['username' => $this->getUser()->getUserIdentifier()])->getGame()->getId();
    }
}
