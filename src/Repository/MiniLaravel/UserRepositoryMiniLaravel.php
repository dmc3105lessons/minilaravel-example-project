<?php

namespace App\Repository\MiniLaravel;

use App\Repository\UserRepositoryInterface;
use App\Model\User;
use Override;

class UserRepositoryMiniLaravel implements UserRepositoryInterface
{
    #[Override]
    public function findById(int $id) : User
    {
        return User::find($id);
    }

    #[Override]
    public function findAll(): array
    {
        return User::query()->execute();
    }

    #[Override]
    public function create(User $user) : User
    {
        $user->save();
        return $user;
    }

    #[Override]
    public function update(User $user) : User
    {
        $user->save();
        return $user;
    }

    #[Override]
    public function deleteById(int $id) : void
    {
        User::find($id)->delete();
    }
}