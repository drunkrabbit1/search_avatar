<?php

namespace App\Facades;

use App\Enums\AppType;
use App\Repository\Interfaces\AvatarSearchContract;
use Illuminate\Support\Facades\Facade;

/**
 * @method AvatarSearchContract for(AppType $appType)
 */
class SearchAvatar extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'avatar.search.service';
    }
}
