<?php

namespace App\Controller;

use App\Model\User;
use App\Service\UserService;
use MiniLaravel\Routing\Attributes\Route;
use MiniLaravel\Routing\Request;
use MiniLaravel\Routing\Response;

class UserController {
    public function __construct(
        private UserService $userService
    )
    {
    }

    #[Route("/users")]
    public function index() : Response {
        return Response::json($this->userService->getAll());
    }

    #[Route("/users/{id}")]
    public function getUser(int $id) : Response {
        return Response::json($this->userService->getById($id));
    }

    #[Route("/users", "POST")]
    public function store(Request $request) : Response {
        $user = new User($request->input());
        $user = $this->userService->create($user);
        return Response::json($user, 201);
    }

    #[Route("/users", "PUT")]
    public function update(Request $request) : Response {
        $user = new User($request->input());
        $user = $this->userService->update($user);
        return Response::json($user);
    }

    #[Route("/users/{id}", "DELETE")]
    public function delete(int $id)
    {
        $this->userService->delete($id);
        return Response::json(["status" => "ok"]);
    }
}
