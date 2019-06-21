<?php


namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Utilities\AbstractController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class UserController extends AbstractController
{


    private $userRepository;





    public function liste(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $users=$this->userRepository->findAll();

        return $this->twig->render(
            $response,
            'users/liste.twig',
            ['users' => $users
            ]
        );
    }



    public function __construct(Twig $twig, UserRepository $userRepository)
    {
        $this->userRepository=$userRepository;

        parent::__construct($twig);
    }
}
