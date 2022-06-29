<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;

class HomeControllerTest extends TestCase
{
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

    private function getTestResponse(int $type): MockHttpClient
    {
        if ($type == 1) {
            $response = json_encode([]);
            return new MockHttpClient($response);
        }

        if ($type == 2) {
            $response = json_encode([
                'error_code' => 403,
            ]);
            return new MockHttpClient($response);
        }

        if ($type == 3) {
            $response = json_encode([
                'error_code' => 500,
                'message' => 'some error',
            ]);
            return new MockHttpClient($response);
        }

        if ($type == 4) {
            $response = json_encode([
                'fact' => null,
            ]);
            return new MockHttpClient($response);
        }

        if ($type == 5) {
            $response = json_encode([
                'fact' => 2143,
            ]);
            return new MockHttpClient($response);
        }

        return new MockHttpClient(json_encode([]));
    }

    public function testSomething(): void
    {

        $client = $this->getTestResponse(1);

        $this->assertEquals();



        //$this->assertTrue(true);

    }
}
