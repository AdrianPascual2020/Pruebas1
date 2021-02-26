<?php

namespace App\Http\Requests;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            Task::NAME  => ['required', 'string'],
            'category.*'  => ['required', 'integer', Rule::exists(Category::TABLE, Category::ID)]
        ];
    }
}
