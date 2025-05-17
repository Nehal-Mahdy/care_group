<?php

namespace App\Http\Requests\Orders;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $StyleRules = (new StoreOrderRequest())->rules();
        $updateRules = [];
        foreach ($StyleRules as $key => $value) {
            $updateRules[$key] = 'sometimes|' . $value;
        }
        return $updateRules;
    }

        /**
     * [failedValidation [Overriding the event validator for custom error response]]
     * @param  Validator $validator [description]
     * @return [object][object of various validation errors]
     */
    public function failedValidation(Validator $validator)
    {
        //write your bussiness logic here otherwise it will give same old JSON response
        foreach ($validator->errors()->all() as $error) {
            toastr()->error($error);
        }
        return back();
    }
}
