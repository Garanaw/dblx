<?php declare(strict_types = 1);

namespace App\Http\Requests\Content;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class SearchContentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'term' => [
                'required',
                'string',
            ]
        ];
    }
}
