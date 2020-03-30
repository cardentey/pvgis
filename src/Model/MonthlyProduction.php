<?php

declare(strict_types=1);

namespace holicz\PVGIS\Model;

final class MonthlyProduction
{
    private int $month;
    private float $production;

    public function __construct(int $month, float $production)
    {
        $this->month = $month;
        $this->production = $production;
    }

    public function getMonth(): int
    {
        return $this->month;
    }

    public function getProduction(): float
    {
        return $this->production;
    }
}
