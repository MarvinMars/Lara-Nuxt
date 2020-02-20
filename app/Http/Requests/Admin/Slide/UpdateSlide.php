<?php namespace App\Http\Requests\Admin\Slide;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateSlide extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.slide.edit', $this->slide);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'slug' => ['sometimes', Rule::unique('slides', 'slug')->ignore($this->slide->getKey(), $this->slide->getKeyName()), 'string'],
            'fields' => ['sometimes'],
            'template' => ['sometimes'],
        ];
    }
}
