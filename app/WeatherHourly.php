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

    public function getHourData(int $hour): array
    {
        $temp = $this->hourData[$this->currentHour + $hour]['temp_c'];
        $condition = $this->hourData[$this->currentHour + $hour]['condition']['text'];
        return [$temp, $condition];
    }

}