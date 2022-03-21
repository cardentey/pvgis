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
    private ?string $database;

    public function __construct(
        string $latitude,
        string $longitude,
        ?int $angle = null,
        ?int $azimuth = null,
        ?string $database = null
    ) {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->angle = $angle;
        $this->azimuth = $azimuth;
        $this->database = $database;
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

    public function setDatabase(?string $database): void
    {
        $this->database = $database;
    }

    public function getDatabase(): ?string
    {
        return $this->database;
    }
}
