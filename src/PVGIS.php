<?php

declare(strict_types = 1);

namespace holicz\PVGIS;

use holicz\PVGIS\Adapter\PvgisAdapter;
use holicz\PVGIS\Model\ElectricityProduction;
use Safe\Exceptions\FilesystemException;
use Safe\Exceptions\StringsException;

final class PVGIS
{
    private PvgisAdapter $pvgisAdapter;

    public function __construct(PvgisAdapter $pvgisAdapter)
    {
        $this->pvgisAdapter = $pvgisAdapter;
    }

    /**
     * @param string $latitude
     * @param string $longitude
     *
     * @return ElectricityProduction
     *
     * @throws Exception\InvalidResponseFormatException
     * @throws Exception\PvgisResponseFailureException
     * @throws FilesystemException
     * @throws StringsException
     */
    public function getElectricityProduction(string $latitude, string $longitude): ElectricityProduction
    {
        return $this->pvgisAdapter->getPvgisData($latitude, $longitude);
    }
}
