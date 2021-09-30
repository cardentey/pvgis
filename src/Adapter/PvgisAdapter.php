<?php

declare(strict_types=1);

namespace holicz\PVGIS\Adapter;

use Exception;
use holicz\PVGIS\Exception\InvalidResponseFormatException;
use holicz\PVGIS\Exception\PvgisResponseFailureException;
use holicz\PVGIS\Model\ElectricityProduction;
use holicz\PVGIS\Model\Request;

use function file_get_contents;

final class PvgisAdapter
{
    /**
     * @throws InvalidResponseFormatException
     * @throws PvgisResponseFailureException
     */
    public function getPvgisData(Request $request): ElectricityProduction
    {
        $urlBuilder = new UrlBuilder($request);
        $response = file_get_contents($urlBuilder->build());

        if (!$response) {
            throw new PvgisResponseFailureException();
        }

        return $this->parsePvgisResponse($response);
    }

    /**
     * @throws InvalidResponseFormatException
     */
    private function parsePvgisResponse(string $response): ElectricityProduction
    {
        try {
            $response = json_decode($response, true, 512, JSON_THROW_ON_ERROR);

            $electricityProduction = new ElectricityProduction($response['outputs']['totals']['fixed']['E_y']);
            foreach ($response['outputs']['monthly']['fixed'] as $month) {
                $electricityProduction->addMonthlyProduction($month['month'], $month['E_m']);
            }
        } catch (Exception $e) {
            throw new InvalidResponseFormatException();
        }

        return $electricityProduction;
    }
}
