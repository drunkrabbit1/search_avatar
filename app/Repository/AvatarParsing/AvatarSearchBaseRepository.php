<?php

namespace App\Repository\AvatarParsing;

use App\Repository\Interfaces\AvatarSearchContract;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\ArrayShape;

class AvatarSearchBaseRepository implements AvatarSearchContract
{
    protected Response|PromiseInterface|null $response = null;
    protected array $headers = [];
    protected string|null $url = null;

    public function search(string $link = ''): self|null
    {
        return $this;
    }

    public function getIconUrl(): string|null
    {
        return $this->toCollect()->get('', '');
    }

    public function toCollect(): Collection
    {
        return $this->response()->collect();
    }

    public function response(): PromiseInterface|Response|null
    {
        return $this->response;
    }

    #[ArrayShape(['user-agent' => "string[]"])]
    protected function addHeaderFakeUserAgent(): self
    {
        $this->headers['user-agent'] = [
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36'
        ];

        return $this;
    }
}
