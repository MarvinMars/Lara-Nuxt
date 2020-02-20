<?php namespace App\Http\Requests\Admin\Block;

use Brackets\Translatable\TranslatableFormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateBlock extends TranslatableFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.block.edit', $this->block);
    }

/**
     * Get the validation rules that apply to the requests untranslatable fields.
     *
     * @return    array
     */
    public function untranslatableRules() {
        return [
            'name' => ['sometimes', 'string'],
            'group' => ['nullable', 'string'],
            'html' => ['nullable', 'string'],
            'order' => ['sometimes', 'integer'],
            'post_id' => ['sometimes', 'integer'],
            
        ];
    }

    /**
     * Get the validation rules that apply to the requests translatable fields.
     *
     * @return    array
     */
    public function translatableRules($locale) {
        return [
            'fields' => ['nullable', 'string'],
            
        ];
    }
}
