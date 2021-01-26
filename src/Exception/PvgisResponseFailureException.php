<?php

declare(strict_types = 1);

namespace holicz\PVGIS\Exception;

use holicz\SimpleException\BaseException;
use holicz\SimpleException\ExceptionContext;

final class PvgisResponseFailureException extends BaseException
{
    public function __construct()
    {
        $exceptionContext = new ExceptionContext(
            'Nepodařilo se získat informace z evropského Fotovoltaického geografického informačního systému.',
            'Failed to get response from Pvgis API',
            500
        );

        parent::__construct($exceptionContext);
    }
}
