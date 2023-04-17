<?php

namespace Tests\Unit\Services;

use App\Adapters\Http\Interfaces\HttpAdapter;
use App\Services\CountryService;
use Illuminate\Support\Facades\Config;
use Mockery;
use Tests\TestCase;

class CountryServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testGetCountries()
    {
        $endpointData = [
            [
                'name' => [
                    'common' => 'Colombia'
                ]
            ],
            [
                'name' => [
                    'common' => 'Mexico'
                ]
            ],
            [
                'name' => [
                    'common' => 'Brasil'
                ]
            ],
        ];

        Config::set('services.restcountries.endpoint', 'https://third.vom'); 

        $adapter = Mockery::mock(HttpAdapter::class);
        $adapter->shouldReceive('get')->andReturn($endpointData);

        $service = new CountryService($adapter);
        $result = $service->getCountries();

        $this->assertIsArray($result);
        $this->assertEquals($result[0], $endpointData[0]['name']['common']);
    }
}
