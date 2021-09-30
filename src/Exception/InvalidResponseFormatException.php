<?php

declare(strict_types = 1);

namespace holicz\PVGIS\Exception;

use Exception;

final class InvalidResponseFormatException extends Exception
{
    public function __construct()
    {
        parent::__construct('Pvgis responded with unknown format.', 500);
    }
}
