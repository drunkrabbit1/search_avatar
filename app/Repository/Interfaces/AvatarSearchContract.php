<?php

namespace App\Repository\Interfaces;

use Illuminate\Support\Collection;

interface AvatarSearchContract
{
    public function search(string $link): self|null;
    public function getIconUrl(): string|null;
    public function toCollect(): Collection;
}
