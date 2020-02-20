<?php namespace App\Http\Requests\Admin\Hero;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Validator;

class StoreHero extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.hero.create');
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'template' => ['required'],
            'slug' => ['required', Rule::unique('heroes', 'slug'), 'string'],
            'slides.*.slug' => ['required'],
            'slides.*.fields' => ['required'],
        ];
    }
}
