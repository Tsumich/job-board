<?php

namespace App\Http\Requests;

use App\Models\Work;
use Illuminate\Foundation\Http\FormRequest;

class WorkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary' => 'required|numeric|max:5000',
            'description' => 'required|string',
            'expirience' => 'required|in:' . implode(',', Work::$expirience),
            'category' => 'required|in:' . implode(',', Work::$category),
        ];
    }
}
