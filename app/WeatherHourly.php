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

    public function getCurrentHourData(): array
    {
        $temp = $this->hourData[$this->currentHour]['temp_c'];
        $condition = $this->hourData[$this->currentHour]['condition']['text'];
        return [$temp, $condition];
    }

    public function get1HourData(): array
    {
        $temp = $this->hourData[$this->currentHour + 1]['temp_c'];
        $condition = $this->hourData[$this->currentHour + 1]['condition']['text'];
        return [$temp, $condition];
    }

    public function get2HourData(): array
    {
        $temp = $this->hourData[$this->currentHour + 2]['temp_c'];
        $condition = $this->hourData[$this->currentHour + 2]['condition']['text'];
        return [$temp, $condition];
    }

    public function get3HourData(): array
    {
        $temp = $this->hourData[$this->currentHour + 3]['temp_c'];
        $condition = $this->hourData[$this->currentHour + 3]['condition']['text'];
        return [$temp, $condition];
    }

    public function get4HourData(): array
    {
        $temp = $this->hourData[$this->currentHour + 4]['temp_c'];
        $condition = $this->hourData[$this->currentHour + 4]['condition']['text'];
        return [$temp, $condition];
    }

    public function get5HourData(): array
    {
        $temp = $this->hourData[$this->currentHour + 5]['temp_c'];
        $condition = $this->hourData[$this->currentHour + 5]['condition']['text'];
        return [$temp, $condition];
    }

    public function get6HourData(): array
    {
        $temp = $this->hourData[$this->currentHour + 6]['temp_c'];
        $condition = $this->hourData[$this->currentHour + 6]['condition']['text'];
        return [$temp, $condition];
    }

    public function get7HourData(): array
    {
        $temp = $this->hourData[$this->currentHour + 7]['temp_c'];
        $condition = $this->hourData[$this->currentHour + 7]['condition']['text'];
        return [$temp, $condition];
    }

    public function get8HourData(): array
    {
        $temp = $this->hourData[$this->currentHour + 8]['temp_c'];
        $condition = $this->hourData[$this->currentHour + 8]['condition']['text'];
        return [$temp, $condition];
    }

}