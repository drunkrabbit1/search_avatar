<?php

namespace App\Repository\AvatarParsing;

use Illuminate\Support\Collection;

class GooglePlayRepository extends AvatarSearchBaseRepository
{
    public function search(string $link = ''): self|null
    {
        return $this;
    }

    public function getIconUrl(): string|null
    {
        return $this->toCollect()->get('');
    }

    public function toCollect(): Collection
    {
        return collect();
    }
}
