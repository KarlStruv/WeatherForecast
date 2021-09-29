<?php

namespace App;

class WeatherHourly
{
    private array $hourData;
    private int $currentHour;

    public function __construct(array $hourData, int $currentHour)
    {
        $this->hourData = $hourData;
        $this->currentHour = $currentHour;

    }

    public function getCurrentHour(): int
    {
        return $this->currentHour;
    }

    public function getHourData(int $hours): array
    {
        $temp = $this->hourData[$this->currentHour + $hours]['temp_c'];
        $condition = $this->hourData[$this->currentHour + $hours]['condition']['text'];
        return [$temp, $condition];
    }

}