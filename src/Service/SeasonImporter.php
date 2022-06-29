<?php

namespace App\Service;

class SeasonImporter
{


    private function getSeason()
    {
        $currentWeek = (int) date('W');

        $res = $currentWeek % 4;
        $fact = null;

        $response = $this->httpClient->request('GET', 'https://catfact.ninja/fact')->getContent();

        if (!empty($response)) {
            $factRaw = json_decode($response, true);
            $fact = $factRaw['fact'];
        }
    }


}