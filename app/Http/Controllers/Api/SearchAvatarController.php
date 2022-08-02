<?php

namespace App\Http\Controllers\Api;

use App\Enums\AppType;
use App\Facades\SearchAvatar;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchAvatarRequest;
use Illuminate\Http\JsonResponse;

class SearchAvatarController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param SearchAvatarRequest $request
     * @return JsonResponse
     */
    public function __invoke(SearchAvatarRequest $request): JsonResponse
    {
        $app = SearchAvatar::for(AppType::from($request->appType));
        $appIconUrl = $app->search($request->get($request->appType))?->getIconUrl();
        if (!$appIconUrl) {
            return response()->json(['message' => __('app.errors.not_found')], 404);
        }

        return response()->json([
            'app_icon' => $appIconUrl
        ]);
    }
}
