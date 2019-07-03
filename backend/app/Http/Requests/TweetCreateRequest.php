<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TweetCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'tweet' => 'required|max:255',
        ];
    }
}
