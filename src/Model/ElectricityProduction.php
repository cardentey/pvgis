<?php

declare(strict_types = 1);

namespace holicz\PVGIS\Model;

final class ElectricityProduction
{
    /** @var MonthlyProduction[] */
    private array $monthlyProductions = [];
    private float $yearlyProduction;

    public function __construct(float $yearlyProduction)
    {
        $this->yearlyProduction = $yearlyProduction;
    }

    public function addMonthlyProduction(int $month, float $production): self
    {
        $this->monthlyProductions[] = new MonthlyProduction($month, $production);

        return $this;
    }

    public function getYearlyProduction(): float
    {
        return $this->yearlyProduction;
    }
}
