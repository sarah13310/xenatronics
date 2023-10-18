<?php
// src/Service/SecretTokenService.php

namespace App\Service;

use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use App\Entity\User;

class SecretTokenService
{
    private $jwtManager;
    private string $secretToken;

    public function __construct(JWTTokenManagerInterface $jwtManager)
    {
        $this->jwtManager = $jwtManager;
    }

    public function generateToken(User $user): string
    {
        $this->secretToken=$this->jwtManager->create($user);
        return $this->secretToken;
    }

    public function getUserFromToken(string $token): ?User
    {
        $decodedToken = $this->jwtManager->decode($token);
        dd($decodedToken);
        // Vous devez implémenter la logique pour récupérer l'utilisateur
        // par exemple, en utilisant le User Repository et l'identifiant stocké dans le token
        // $userId = $decodedToken['sub'];
        // $user = $this->userRepository->find($userId);

        // Dans cet exemple, nous supposons que l'utilisateur est stocké dans le token sous la clé 'user'
        // Vous devrez adapter cette logique à votre application
        $user = $decodedToken['user'] ?? null;
        return $user;
    }
}
