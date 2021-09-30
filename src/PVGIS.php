<?php

declare(strict_types = 1);

namespace holicz\PVGIS;

use holicz\PVGIS\Adapter\PvgisAdapter;
use holicz\PVGIS\Model\ElectricityProduction;
use holicz\PVGIS\Model\Request;

final class PVGIS
{
    private PvgisAdapter $pvgisAdapter;

    public function __construct(PvgisAdapter $pvgisAdapter)
    {
        $this->pvgisAdapter = $pvgisAdapter;
    }

    /**
     * @throws Exception\InvalidResponseFormatException
     * @throws Exception\PvgisResponseFailureException
     */
    public function getElectricityProduction(
        string $latitude,
        string $longitude,
        ?int $angle = null,
        ?int $azimuth = null
    ): ElectricityProduction {
        $request = new Request($latitude, $longitude, $angle, $azimuth);

        return $this->pvgisAdapter->getPvgisData($request);
    }
}
