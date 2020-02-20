<?php namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdatePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.post.edit', $this->post);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'title' => ['sometimes', 'string'],
            'keywords' => ['nullable'],
            'description' => ['nullable'],
            'header_subtitle' => [
                'nullable',
                'string',
                function ($attribute, $value, $fail) {
                    if ($value === $this->get('title') || empty($value)) {
                        $fail('Subtitle can\'t be the same like Title.');
                    }
                }
            ],
            'slug' => [
                'sometimes',
                Rule::unique('posts', 'slug')->ignore($this->post->getKey(), $this->post->getKeyName()),
                'string'
            ],
            'published_at' => ['nullable', 'date'],
            'enabled' => ['sometimes', 'boolean'],
            'type' => ['string'],
        ];
    }
}
