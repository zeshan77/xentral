<?php

namespace Zeshankhattak\XentralExercise\Controllers;

use Jenssegers\Blade\Blade;

abstract class BaseController
{
    protected Blade $blade;

    public function __construct()
    {
        $this->blade = new Blade('views', 'cache');
    }
}