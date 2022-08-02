<?php

namespace App\Services;

use App\Enums\AppType;
use App\Repository\AvatarParsing\VKRepository;
use App\Repository\Interfaces\AvatarSearchContract;
use Exception;

class SearchAvatar
{
    /**
     * @throws Exception
     */
    public function for(AppType $type): AvatarSearchContract
    {
        return match ($type) {
            /** TODO: допилить с впном */
//            AppType::GOOGLE_PLAY    => new GooglePlayRepository(),
            AppType::VK             => new VKRepository(),

            default                => throw new Exception(__('app.errors.not_configured')),
        };
    }
}
