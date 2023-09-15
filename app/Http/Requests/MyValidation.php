<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MyValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
{
    return [
        'firstname' => [
            'sometimes',
            'required',
        ],
        'middlename' => [
            'sometimes',
            'required',
        ],
        'surname' => [
            'sometimes',
            'required',
        ],
        'username' => [
            'sometimes',
            'required',
        ],
        'email' => [
            'sometimes',
            'unique:maternal_users,email',
            'nullable',
            'email',
        ],
        'role' => [
            'sometimes',
            'required',
        ],
        'password' => [
            'sometimes',
            'required',
            'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/',
        ],

        'birthdate' => [
            'sometimes',
            'required',
        ],
        'sex' => [
            'sometimes',
            'required',
        ],
        'region' => [
            'sometimes',
            'required',
        ],
        'address' => [
            'sometimes',
            'required',
        ],
        'phone_number' => [
            'sometimes',
            'required',
            'regex:/^\+?[0-9]+$/',
        ],

        'emergency_contact_name' => [
            'sometimes',
            'required',
        ],
        'relationship_with_patient' => [
            'sometimes',
            'required',
        ],
        'emergency_contact_number' => [
            'sometimes',
            'required',
            'regex:/^\+?\d+$/',
        ],
        'observations' => [
            'sometimes',
            'required',
        ],
        'hypothesis' => [
            'sometimes',
            'required',
        ],
        'diagnostic_tests' => [
            'sometimes',
            'required',
        ],
        'diagnostic_results' => [
            'sometimes',
            'required',
        ],
        'diagnosis' => [
            'sometimes',
            'required',
        ],
        'medications' => [
            'sometimes',
            'required',
        ],
        'treatment_plan' => [
            'sometimes',
            'required',
        ],
        'doctors_id' => [
            'sometimes',
            'required',
        ],
        'date' => [
            'sometimes',
            'required',
        ],
        'starting_time' => [
            'sometimes',
            'required',
        ],
        'ending_time' => [
            'sometimes',
            'required',
        ],
    ];
}

}
