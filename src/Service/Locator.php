<?php

namespace App\Service;

use App\Entity\Estate;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Locator
{
    public const BASE_URL = 'https://api-adresse.data.gouv.fr';

    public function __construct(private HttpClientInterface $client)
    {
    }

    public function getCoordinates(Localizable $estate): array
    {
        $response = $this->client->request('GET', self::BASE_URL . '/search', [
            'query' => [
                'q' => $estate->getSearchAddress(),
            ]
        ]);

        if ($response->getStatusCode() === 200) {
            $content = $response->toArray();
            return $content['features'][0]['geometry']['coordinates'];
        }

        return [];
    }
}
