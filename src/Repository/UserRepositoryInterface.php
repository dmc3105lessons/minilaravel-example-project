<?php

namespace App\Repository;

use App\Model\User;

interface UserRepositoryInterface
{
    public function findAll() : array;
    public function findById(int $id) : User;
    public function create(User $user) : User;
    public function update(User $user) : User;
    public function deleteById(int $id) : void;
}