<?php

namespace App\Service;

use MongoDB\Client;

class MongoClientService
{
    private Client $client;

    public function __construct(string $uri)
    {
        $this->client = new Client($uri);
    }

    public function getDatabase(string $name)
    {
        return $this->client->selectDatabase($name);
    }
}