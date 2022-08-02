<?php

namespace App\Repository\AvatarParsing;

use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;

class VKRepository extends AvatarSearchBaseRepository
{
    public function __construct()
    {
        $this->url = 'https://vk.com';
        $this->addHeaderFakeUserAgent();
    }

    public function search(string $link = ''): self|null
    {
        $response = Http::withHeaders($this->headers)->get("$this->url/$link");

        $this->response = $response;

        if ($response->status() > 210) {
            return null;
        }

        return $this;
    }

    public function getIconUrl(): string|null
    {
        $crawler = new Crawler($this->response);

        return $crawler->filter('div#page_avatar > a > img')?->getNode(0)
            ?->attributes?->getNamedItem('src')?->value;
    }
}
