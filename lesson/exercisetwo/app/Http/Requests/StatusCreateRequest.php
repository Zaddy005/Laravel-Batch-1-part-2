<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StatusCreateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            "name"=>"required|unique:statuses,name"
        ];
    }
}
