<?php

namespace App\Http\Requests;

use App\Enums\AppType;
use Illuminate\Foundation\Http\FormRequest;

class SearchAvatarRequest extends FormRequest
{
    public string|bool|null $appType = false;

    protected $format = 'json';
    protected $stopOnFirstFailure = true;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function attributes(): array
    {
        $attributes = parent::attributes();

        $this->appType = collect($this->only(AppType::getCodes()->all()))->keys()->first();

        return array_merge($attributes, []);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $appCodes = AppType::getCodes();
        $appCodeListRules = [];

        foreach ($appCodes as $appCode) {
            $appCodeListRules[$appCode] = [
                'required_without_all:' . $appCodes->diff([$appCode])->implode(','),
                'nullable',
                'string'
            ];
        }

        return array_merge_recursive($appCodeListRules, []);
    }

    public function messages(): array
    {
        $appCodeListMessages = [];

        foreach (AppType::getCodes() as $appCode) {
            $appCodeListMessages["$appCode.required_without_all"] = __('validation.required_app_type');
        }

        return $appCodeListMessages;
    }
}
