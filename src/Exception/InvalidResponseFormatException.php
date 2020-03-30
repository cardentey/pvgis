<?php

declare(strict_types = 1);

namespace holicz\PVGIS\Exception;

use holicz\SimpleException\BaseException;
use holicz\SimpleException\ExceptionContext;
use Safe\Exceptions\StringsException;

final class InvalidResponseFormatException extends BaseException
{
    /**
     * @param array<string, mixed> $parameters
     *
     * @throws StringsException
     */
    public function __construct(array $parameters = [])
    {
        $exceptionContext = new ExceptionContext(
            'Nepodařilo se získat informace z evropského Fotovoltaického geografického informačního systému.',
            \Safe\sprintf('Pvgis responded with unknown format. Response: %s', $parameters['response']),
            $parameters,
            500
        );

        parent::__construct($exceptionContext);
    }
}
