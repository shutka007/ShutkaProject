<?php

namespace App\Services;

use GuzzleHttp\Client;
use App\Models\Category;
class DummyJsonService
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getCategories()
    {
        $response = $this->client->request('GET', 'https://dummyjson.com/products/categories');

        if ($response->getStatusCode() == 200) {
            $categories = json_decode($response->getBody()->getContents());

            foreach ($categories as $category) {
                $categories1 = new Category;
                $categories1->category_name = $category;
                return $categories1->save();
            }
        }
    }
}