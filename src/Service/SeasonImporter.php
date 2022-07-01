<?php

namespace App\Service;

use App\Helper\NumToSeason;
use JetBrains\PhpStorm\ArrayShape;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class SeasonImporter
{

    public function __construct(
        private NumToSeason $numToSeason,
        private HttpClientInterface $httpClient,
    ) {}

    public function getCurrentSeason(int $currentWeek): int
    {
        $result = $currentWeek % 4;
        $seasonName = $this->numToSeason->getLabels()[$result];
        return $seasonName;

    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function getCatFact(): ?string
    {
        $fact = null;
        $response = $this->httpClient->request('GET', 'https://catfact.ninja/fact')->getContent();

        if (!empty($response)) {
            $factRaw = json_decode($response, true);
            $fact = $factRaw['fact'] ?? null;
        }
        
        return $fact;
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    #[ArrayShape(['date' => "int", 'seasonName' => "string", 'fact' => "string|null"])]
    public function getSeason(): array
    {
        $currentWeek = (int) date('W');
        $seasonName = $this->getCurrentSeason($currentWeek);
        $fact = $this->getCatFact();

        return [
            'date' => $currentWeek,
            'seasonName' => $seasonName,
            'fact' => $fact
        ];
    }


}