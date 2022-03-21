<?php

declare(strict_types=1);

namespace holicz\PVGIS\Adapter;

use holicz\PVGIS\Model\Request;

/**
 * @internal
 */
final class UrlBuilder
{
    private Request $request;
    private string $url;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->url = 'https://re.jrc.ec.europa.eu/api/pvcalc?peakpower=1&pvtechchoice=crystSi&mountingplace=building&loss=10&outputformat=json';
    }

    public function build(): string
    {
        $this->buildGPSCoordinates();
        $this->buildAngle();
        $this->buildAzimuth();
        $this->buildDatabase();

        return $this->url;
    }

    private function buildGPSCoordinates(): void
    {
        $this->url .= sprintf('&lat=%s&lon=%s', $this->request->getLatitude(), $this->request->getLongitude());
    }

    private function buildAngle(): void
    {
        if ($this->request->getAngle() === null) {
            return;
        }

        $this->url .= sprintf('&angle=%d', $this->request->getAngle());
    }

    private function buildAzimuth(): void
    {
        if ($this->request->getAzimuth() === null) {
            return;
        }

        $this->url .= sprintf('&aspect=%d', $this->request->getAzimuth());
    }

    private function buildDatabase(): void
    {
        if ($this->request->getDatabase() === null) {
            return;
        }

        $this->url .= sprintf('&raddatabase=%s', $this->request->getDatabase());
    }
}
