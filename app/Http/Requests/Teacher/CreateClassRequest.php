<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateClassRequest
 * @package App\Http\Requests\Teacher
 * @property String $name
 * @property String $field
 * @property String $description
 */
class CreateClassRequest extends FormRequest
{




    /**
     * Determine if the user is authorized to make this request.
     *
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
            'name'=> 'required',
            'description'=> 'required',
            'field'=> 'required',
        ];
    }
}
