<?php declare(strict_types = 1);

namespace App\Http\Requests\Content;

use Illuminate\Foundation\Http\FormRequest;

class StoreContentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        return [
            'title'       => [
                'required',
                'string',
                'min:10', // Make it, at least, a bit descriptive
                'max:50', // Give some margin for a rather long title
            ],
            'content'     => [
                'required',
                'string',
                'min:10',
            ],
            'description' => [
                'required',
                'nullable',
                'string',
                'max:150',
            ],
        ];
    }
}
