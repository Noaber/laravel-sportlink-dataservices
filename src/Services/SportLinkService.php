<?php

namespace Noaber\Sportlink\ClubData\Services;

use RuntimeException;
use Illuminate\Support\Facades\Http;

class SportLinkService
{
    private string $baseUri;
    private string $apiKey;

    public function __construct() {
        $this->baseUri = config('sportlink-club-data.base_uri');
        $this->apiKey = config('sportlink-club-data.client_id');
    }

    public function get(string $endpoint, array $query = []): array
    {
        try {
            $response = Http::acceptJson()->get(
                $this->baseUri . '/' . ltrim($endpoint, '/'),
                $query + ['client_id' => $this->apiKey]
            );

            return $response->throw()->json();
        } catch (\Exception $e) {
            throw new RuntimeException($e->getMessage(), $e->getCode());
        }
    }
}