<?php namespace App\Http\Requests\Admin\Hero;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Validator;

class UpdateHero extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.hero.edit', $this->hero);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {

        return [
            'slug' => ['sometimes', Rule::unique('heroes', 'slug')->ignore(
                $this->hero->getKey(), $this->hero->getKeyName()), 'string'
            ],
            'slides.*.slug' => ['required','string'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'slides.*.slug.required' => 'A slug is required',
            'slides.*.slug.unique' => 'A slug must be is unique',
        ];
    }
}
