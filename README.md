# Installation
```bash
composer require holicz/pvgis
```

# Requirements
* PHP >= 7.4

# Usage
```php
<?php

use holicz\PVGIS\PVGIS;
use holicz\PVGIS\Adapter\PvgisAdapter;

$latitude = '50.0898689';
$longitude = '14.4000936';

$pvgis = new PVGIS(new PvgisAdapter());
$electricityProduction = $pvgis->getElectricityProduction($latitude, $longitude);

// Yearly sum of production
$electricityProduction->getYearlyProduction();

foreach ($electricityProduction->getMonthlyProductions() as $monthlyProduction) {
    // Month number
    $monthlyProduction->getMonth();
    // Sum of the monthly production
    $monthlyProduction->getProduction();
}
``` 
