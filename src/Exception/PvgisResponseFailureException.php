<?php

declare(strict_types = 1);

namespace holicz\PVGIS\Exception;

use Exception;

final class PvgisResponseFailureException extends Exception
{
    public function __construct()
    {
        parent::__construct('Failed to get response from Pvgis API', 500);
    }
}
