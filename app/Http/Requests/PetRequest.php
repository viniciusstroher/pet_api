<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetRequest extends FormRequest
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
        switch($this->method())
        {
        
            case 'POST':
                return [
                    'name' => ['required','min:2','unique:pets'],
                    'race' => ['required','max:1',"in:g,G,c,C"]
                ];
                break;

            case 'PUT':
            case 'PATCH':
                return [
                    'name' => ['required','min:2'],
                    'race' => ['required','max:1',"in:g,G,c,C"]
                ];
                break;
        }
    }
}
