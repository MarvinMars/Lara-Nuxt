<?php namespace App\Http\Requests\Admin\Meta;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateMeta extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.meta.edit', $this->metum);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'name' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'property' => ['nullable', 'string'],
        ];
    }
}
