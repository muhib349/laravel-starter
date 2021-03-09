<?php


namespace App\Http\Requests\Roles;


use Illuminate\Foundation\Http\FormRequest;

class CreateRoleRequestValidation extends FormRequest
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
            'name'=> 'required|min:3|unique:roles',
            'display_name'=> 'required|min:3',
            'permissions' => 'required|array',
            'permissions.*'  => 'required|numeric|distinct',
        ];
    }
}
