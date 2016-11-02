<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createContestRequest extends FormRequest
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
          'name' => 'required|min:3',
          'description' => 'required|min:1',
          'question1' => 'required|min:1',
          'answer1' => 'required|min:1',
          'question2' => 'required|min:1',
          'answer2' => 'required|min:1',
          'start_date' => 'required|date',
          'end_date' => 'required|date'
        ];
    }
}
