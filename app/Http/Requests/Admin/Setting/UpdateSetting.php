<?php namespace App\Http\Requests\Admin\Setting;

use Brackets\Translatable\TranslatableFormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateSetting extends TranslatableFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.setting.edit', $this->setting);
    }

/**
     * Get the validation rules that apply to the requests untranslatable fields.
     *
     * @return    array
     */
    public function untranslatableRules() {
        return [
            'slug' => ['nullable', Rule::unique('settings', 'slug')->ignore($this->setting->getKey(), $this->setting->getKeyName()), 'string'],
            'fields' => ['nullable'],
        ];
    }
}
