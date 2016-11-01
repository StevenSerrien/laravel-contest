<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class applyForContestRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'question1' => 'required',
            'answer1' => 'required',
            'question2' => 'required',
            'answer2' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ];
    }
}
