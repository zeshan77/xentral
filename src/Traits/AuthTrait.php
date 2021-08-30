<?php

declare(strict_types=1);

namespace Zeshankhattak\XentralExercise\Traits;

trait AuthTrait {

    protected function checkIfAuthenticated(): void
    {
        if(isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
            $this->redirectToAdmin();
        }
    }

    protected function redirectToAdmin()
    {
        header('Location:' . URL . '/admin', true, 302);
    }

    protected function ifUserExists($email): bool
    {
        $q = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $q->execute(['email' => $email]);
        $q->fetch();

        return (bool)$q->rowCount();
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

    private function createSession($user): void
    {
        $_SESSION['user'] = $user;
        $_SESSION['authenticated'] = true;
    }

    protected function destroySession(): void
    {
        $_SESSION['user'] = null;
        $_SESSION['authenticated'] = false;
    }

}