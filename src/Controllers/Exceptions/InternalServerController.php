<?php

declare(strict_types=1);

namespace Zeshankhattak\XentralExercise\Controllers\Exceptions;

use Jenssegers\Blade\Blade;
use Zeshankhattak\XentralExercise\Controllers\BaseController;

class InternalServerController extends BaseController
{
    public function __invoke(): string
    {
        return $this->blade->render('exceptions.500');
    }
}