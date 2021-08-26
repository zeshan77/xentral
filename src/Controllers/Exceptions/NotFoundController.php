<?php

namespace Zeshankhattak\XentralExercise\Controllers\Exceptions;

use Zeshankhattak\XentralExercise\Controllers\BaseController;

class NotFoundController extends BaseController
{
    public function __invoke()
    {
        return $this->blade->render('exceptions.404');
    }
}