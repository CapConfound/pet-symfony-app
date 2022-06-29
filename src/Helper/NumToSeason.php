<?php

namespace App\Helper;

class NumToSeason
{

    public function getLabels(): array
    {
        return [
            1 => 'Spring',
            2 => 'Summer',
            3 => 'Autumn',
            4 => 'Winter'
        ];
    }

}