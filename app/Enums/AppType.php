<?php

namespace App\Enums;

use Illuminate\Support\Collection;

enum AppType: string
{
    case GOOGLE_PLAY = 'app';
    case VK = 'vk_id';

    /**
     * @return string|null
     */
    public function tittle(): string|null
    {
        return self::getTittles($this);
    }

    /**
     * @param AppType $appType
     * @return string|null
     */
    public static function getTittles(self $appType): string|null
    {
        return match ($appType) {
            self::GOOGLE_PLAY => 'Google Play',
            self::VK => 'ВКонтакте',
            default => null,
        };
    }

    public static function getCodes(): Collection
    {
        return collect(self::cases())->map(fn(self $type) => $type->value);
    }
}
