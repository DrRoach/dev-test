<?php

namespace Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class RickAndMorty
{
    private $baseUrl = "https://rickandmortyapi.com/api/";

    public function all($page = 1)
    {
        $client = $this->getClient();

        try {
            $responseBody = $client->request('get', 'character', [
                'query' => [
                    'page' => $page
                ]
            ])->getBody();
        } catch (ClientException $e) {
            return [];
        }

        $response = json_decode($responseBody->getContents());

        return $response->results;
    }

    public function search($query, $page = 1)
    {
        $client = $this->getClient();

        try {
            $responseBody = $client->request('get', 'character', [
                'query' => [
                    'name' => $query,
                    'page' => $page
                ]
            ])->getBody();
        } catch (ClientException $e) {
            return [];
        }

        $response = json_decode($responseBody->getContents());

        return $response->results;
    }

    private function getClient()
    {
        return new Client([
            'base_uri' => $this->baseUrl,
            'timeout' => 4
        ]);
    }
}
