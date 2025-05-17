<?php

namespace App\Http\Requests\Products;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
        $styleRules = (new StoreProductRequest())->rules();
        $updateRules = [];

        foreach ($styleRules as $key => $value) {
            $updateRules[$key] = 'sometimes|' . $value;
        }

        $updateRules['slug'] = 'sometimes|string|max:255';

        return $updateRules;
    }


    /**
     * [failedValidation [Overriding the event validator for custom error response]]
     * @param  Validator $validator [description]
     * @return [object][object of various validation errors]
     */
    public function failedValidation(Validator $validator)
    {
        foreach ($validator->errors()->all() as $error) {
            toastr()->error($error);
        }
        return back();
    }
}
