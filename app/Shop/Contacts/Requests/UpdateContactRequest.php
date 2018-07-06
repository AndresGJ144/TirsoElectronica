<?php 

namespace App\Shop\Contacts\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateContactRequest extends FormRequest
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
            'name_proprietary' => ['required'],
            'address'  => ['required'],
            'e_mail' => ['required'],
            'telephone_number_1' => ['required']
        ];
    }
    //'cover' => ['required', 'file', 'image:png,jpeg,jpg,gif']

}