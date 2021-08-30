<?php

declare(strict_types=1);

namespace Zeshankhattak\XentralExercise\Controllers\Exceptions;

use Jenssegers\Blade\Blade;
use Zeshankhattak\XentralExercise\Controllers\BaseController;

class NotFoundController extends BaseController
{
    public function __invoke(): string
    {
        return $this->blade->render('exceptions.404');
    }
}