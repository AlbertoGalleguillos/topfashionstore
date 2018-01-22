<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
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
        $attach = count($this->input('attachment'));
        foreach(range(0, $attach) as $index) {
            $rules['attach.' . $index] = 'max:2000';
        }
 
        return $rules;
    }
}
