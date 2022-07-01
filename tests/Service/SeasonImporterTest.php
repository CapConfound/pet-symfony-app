<?php

namespace App\Tests\Service;

use App\Service\SeasonImporter;
use PHPUnit\Framework\TestCase;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class SeasonImporterTest extends TestCase
{

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function testGetSeason()
    {

        $expectation = '';
        $seasonImporter = $this->createMock(SeasonImporter::class);
        $result = $seasonImporter->getSeason();

        $this->assertEquals($expectation, $result);

    }
}