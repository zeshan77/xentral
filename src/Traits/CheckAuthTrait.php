<?php

declare(strict_types=1);

namespace Zeshankhattak\XentralExercise\Traits;

trait CheckAuthTrait {

    public function __construct()
    {
        parent::__construct();

        if(!$_SESSION['authenticated']) {
            $_SESSION['errors'] = ['You are not allowed to access this page.'];
            header('Location:' . URL . '/login', true, 302);
        }
    }

}