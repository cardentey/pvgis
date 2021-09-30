# Installation
```bash
composer require holicz/pvgis
```

# Requirements
* PHP ^7.4|^8.0

# Usage

## Basic usage
```php
<?php

use holicz\PVGIS\PVGIS;
use holicz\PVGIS\Adapter\PvgisAdapter;

$latitude = '50.0898689';
$longitude = '14.4000936';

$pvgis = new PVGIS(new PvgisAdapter());
$electricityProduction = $pvgis->getElectricityProduction(
    $latitude,
    $longitude,
    35, // Solar panels angle (not required)
    CardinalDirection::SOUTH // Solar panels azimuth (not required)
);

// Yearly sum of production
$electricityProduction->getYearlyProduction();

foreach ($electricityProduction->getMonthlyProductions() as $monthlyProduction) {
    // Month number
    $monthlyProduction->getMonth();
    // Sum of the monthly production
    $monthlyProduction->getProduction();
}
``` 

## Using multiplier
If you for example know that you have six solar panels and the production is 1.86x time more bigger than the PVGIS
result you should use the multiplier method

```php
$electricityProduction->multiply(1.86);
```
