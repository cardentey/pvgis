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

    public function __clone()
    {
        $monthlyProductions = [];
        foreach ($this->monthlyProductions as $monthlyProduction) {
            $monthlyProductions[] = clone $monthlyProduction;
        }

        $this->monthlyProductions = $monthlyProductions;
    }

    public function addMonthlyProduction(int $month, float $production): self
    {
        $this->monthlyProductions[] = new MonthlyProduction($month, $production);

        return $this;
    }

    /**
     * @return MonthlyProduction[]
     */
    public function getMonthlyProductions(): array
    {
        return $this->monthlyProductions;
    }

    public function getYearlyProduction(): float
    {
        return $this->yearlyProduction;
    }
}
