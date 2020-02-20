<?php namespace App\Http\Requests\Admin\Menu;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateMenu extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.menu.edit', $this->menu);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'label' => ['sometimes', 'string'],
            'url' => ['sometimes', 'string'],
            'type' => ['sometimes', 'string'],
            'order' => ['sometimes', 'integer'],
            'parent_id' => ['nullable', 'integer'],
            
        ];
    }
}
