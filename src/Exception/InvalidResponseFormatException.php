<?php

declare(strict_types = 1);

namespace holicz\PVGIS\Exception;

use holicz\SimpleException\BaseException;
use holicz\SimpleException\ExceptionContext;
use Safe\Exceptions\StringsException;

final class InvalidResponseFormatException extends BaseException
{
    /**
     * @throws StringsException
     */
    public function __construct()
    {
        $exceptionContext = new ExceptionContext(
            'Nepodařilo se získat informace z evropského Fotovoltaického geografického informačního systému.',
            \Safe\sprintf('Pvgis responded with unknown format.'),
            500
        );

        parent::__construct($exceptionContext);
    }
}
