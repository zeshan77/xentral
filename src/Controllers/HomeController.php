<?php

namespace Zeshankhattak\XentralExercise\Controllers;

class HomeController extends BaseController
{
    public function __invoke(): string
    {
        return $this->blade->render('home');
    }

}