<?php

declare(strict_types=1);

namespace Zeshankhattak\XentralExercise\Traits;

trait AuthTrait {

    protected function ifUserExists($email): bool
    {
        $q = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $q->execute(['email' => $email]);
        $q->fetch();

        return $q->rowCount() ? true : false;
    }

    protected function attempt(string $email, string $password)
    {
        $password = crypt($password, getenv('SALT'));
        $q = $this->pdo->prepare("SELECT * FROM users WHERE email = :email and password = :password");
        $q->execute(['email' => $email, 'password' => $password]);
        $user = $q->fetch();


        if(!$user) return false;

        $this->createSession($user);

        return $user;

    }

    private function createSession($user)
    {
        $_SESSION['user'] = $user;
        $_SESSION['authenticated'] = true;
    }

    protected function destroySession()
    {
        $_SESSION['user'] = null;
        $_SESSION['authenticated'] = false;
    }

}