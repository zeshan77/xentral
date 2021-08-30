<?php

declare(strict_types=1);

namespace Zeshankhattak\XentralExercise\Controllers\Auth;

use Jenssegers\Blade\Blade;
use Zeshankhattak\XentralExercise\Traits\AuthTrait;
use Zeshankhattak\XentralExercise\Controllers\BaseController;

class LoginController extends BaseController
{
    use AuthTrait;

    public function showForm(): string
    {
        $this->checkIfAuthenticated();
        return $this->blade->render('auth.login');
    }

    public function authenticate()
    {
        if(!$_POST['signin']) {
            header('Location:' . URL . '/login', true, 302);
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        if(! $this->attempt($email, $password)) {
            $_SESSION['errors'] = ['Invalid login credentials.'];
            header('Location:' . URL . '/login', true, 302);
            exit;
        }

        header('Location:' . URL . '/admin', true, 302);
    }
}