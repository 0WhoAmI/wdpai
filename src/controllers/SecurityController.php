<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../repository/UserRepository.php';

class SecurityController extends AppController
{
    public function login()
    {
        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = $userRepository->getUser($email);

        if(!$user){
            return $this->render('login', ['messages' => ['User not exist!']]);
        }

        if ($email !== $user->getEmail()) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }


        if ($password !== $user->getPassword()) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        // return $this->render('found');

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/found");
    }
}
