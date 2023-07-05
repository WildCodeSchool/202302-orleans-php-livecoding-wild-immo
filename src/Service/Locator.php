<?php

namespace App\Service;

use App\Entity\Estate;
use Exception;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Locator
{
    public const BASE_URL = 'https://api-adresse.data.gouv.fr';

    public function __construct(private HttpClientInterface $client)
    {
    }

    public function getCoordinates(Localizable $localizable): array
    {
        $response = $this->client->request('GET', self::BASE_URL . '/search', [
            'query' => [
                'q' => $localizable->getLocalization(),
            ]
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new Exception('Problème de récupération de l\'adresse, veuillez rééssayer');
        }

        $content = $response->toArray();
        if (!isset($content['features'][0]['geometry']['coordinates'])) {
            throw new Exception('Adresse inconnue, veuillez la vérifier ou la préciser');
        }

        return $content['features'][0]['geometry']['coordinates'];
    }
}
