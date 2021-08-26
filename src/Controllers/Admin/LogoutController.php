<?php

namespace Zeshankhattak\XentralExercise\Controllers\Admin;


use Zeshankhattak\XentralExercise\Traits\AuthTrait;

class LogoutController
{
    use AuthTrait;

    public function __invoke()
    {
        $this->destroySession();

        $_SESSION['message'] = 'You are logged out!';
        header('Location:' . URL . '/login', true, 302);
    }
}