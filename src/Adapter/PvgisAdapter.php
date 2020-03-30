<?php

declare(strict_types=1);

namespace holicz\PVGIS\Adapter;

use Exception;
use holicz\PVGIS\Exception\InvalidResponseFormatException;
use holicz\PVGIS\Exception\PvgisResponseFailureException;
use holicz\PVGIS\Model\ElectricityProduction;
use Safe\Exceptions\FilesystemException;
use Safe\Exceptions\StringsException;

final class PvgisAdapter
{
    private const API_URL = 'https://re.jrc.ec.europa.eu/api/pvcalc?peakpower=1&pvtechchoice=crystSi&mountingplace=building&loss=10&outputformat=json&angle=35&lat=%s&lon=%s';

    /**
     * Multiplier to change the PVGIS result in order to get desired production
     */
    private float $multiplier;

    public function __construct(float $multiplier = 1.0)
    {
        $this->multiplier = $multiplier;
    }

    /**
     * @param string $latitude
     * @param string $longitude
     *
     * @return ElectricityProduction
     *
     * @throws FilesystemException
     * @throws InvalidResponseFormatException
     * @throws PvgisResponseFailureException
     * @throws StringsException
     */
    public function getPvgisData(string $latitude, string $longitude): ElectricityProduction
    {
        $response = \Safe\file_get_contents(\Safe\sprintf(self::API_URL, $latitude, $longitude));

        if (!$response) {
            throw new PvgisResponseFailureException();
        }

        return $this->parsePvgisResponse($response);
    }

    /**
     * @param string $response
     *
     * @return ElectricityProduction
     *
     * @throws InvalidResponseFormatException
     * @throws StringsException
     */
    private function parsePvgisResponse(string $response): ElectricityProduction
    {
        try {
            $response = json_decode($response, true, 512, JSON_THROW_ON_ERROR);

            $electricityProduction = new ElectricityProduction($this->multiplier * $response['outputs']['totals']['fixed']['E_y']);
            foreach ($response['outputs']['monthly']['fixed'] as $month) {
                $electricityProduction->addMonthlyProduction($month['month'], $this->multiplier * $month['E_m']);
            }
        } catch (Exception $e) {
            throw new InvalidResponseFormatException(['response' => $response]);
        }

        return $electricityProduction;
    }
}
