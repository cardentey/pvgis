<?php

declare(strict_types=1);

namespace holicz\PVGIS\Model;

/**
 * @internal
 */
final class Request
{
    private string $latitude;
    private string $longitude;
    private ?int $angle;
    private ?int $azimuth;

    public function __construct(
        string $latitude,
        string $longitude,
        ?int $angle = null,
        ?int $azimuth = null
    ) {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->angle = $angle;
        $this->azimuth = $azimuth;
    }

    public function getLatitude(): string
    {
        return $this->latitude;
    }

    public function getLongitude(): string
    {
        return $this->longitude;
    }

    public function setAngle(?int $angle): void
    {
        $this->angle = $angle;
    }

    public function getAngle(): ?int
    {
        return $this->angle;
    }

    public function setAzimuth(?int $azimuth): void
    {
        $this->azimuth = $azimuth;
    }

    public function getAzimuth(): ?int
    {
        return $this->azimuth;
    }
}
