<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Helper\CommonHelper;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:500'],
            'image' => ['nullable', File::types(['jpeg', 'jpg', 'png', 'webp'])->max(1 * 1024)]
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $category = $this->route('category');
            $rules['name'] = [
                'required', 'string', 'max:255',
                Rule::unique(Category::class)->ignore($category),
            ];

            $rules['image'] = array_merge(['nullable'], CommonHelper::getImageValidationRule('image'));
        }
        
        return $rules;
    }

    public function validated($key = null, $default = null)
    {
        $inputs = parent::validated();
        $inputs['status'] = $inputs['status'] ?? 0;
        $inputs['slug'] = Str::slug($inputs['name'], '-') ?: CommonHelper::makeSlug($inputs['name']);

        return $inputs;
    }
}
