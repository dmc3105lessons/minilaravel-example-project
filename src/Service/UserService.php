<?php

namespace App\Service;

use App\Controller\UserController;
use App\Model\User;
use App\Repository\UserRepositoryInterface;

class UserService{
    function __construct(
        private UserRepositoryInterface $userRepository,
    )
    {
    }

    public function getAll() : array {
        return $this->userRepository->findAll();
    }

    public function getById(int $id) : User {
        return $this->userRepository->findById($id);
    }

    public function create(User $user) : User {
        return $this->userRepository->create($user);
    }
    
    public function update(User $user) : User {
        return $this->userRepository->update($user);
    }
    
    public function delete(int $id) : void {
        $this->userRepository->deleteById($id);
    }
}