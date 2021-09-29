<?php

namespace App;

class WeatherDaily
{
    private string $date;
    private float $tempCelsius;
    private string $condition;

    public function __construct(string $date, float $tempCelsius, string $condition)
    {
        $this->date = $date;
        $this->tempCelsius = $tempCelsius;
        $this->condition = $condition;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getAvgTempCelsius(): float
    {
        return $this->tempCelsius;
    }

    public function getCondition(): string
    {
        return $this->condition;
    }


}