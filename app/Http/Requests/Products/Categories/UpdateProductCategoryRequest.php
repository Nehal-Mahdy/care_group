<?php

namespace App\Http\Requests\Products\Categories;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class UpdateProductCategoryRequest extends FormRequest
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
        $storeRules = (new StoreProductCategoryRequest())->rules();

        $updateRules = [];
        foreach ($storeRules as $key => $rule) {
            $updateRules[$key] = 'sometimes|' . $rule;
        }

        // Ensure slug follows proper validation and isn't conflicting
        $updateRules['slug'] = 'sometimes|string|max:255';

        return $updateRules;
    }

    /**
     * Handle failed validation.
     *
     * @param  Validator $validator
     * @throws ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        foreach ($validator->errors()->all() as $error) {
            toastr()->error($error);
        }

        throw new ValidationException($validator);
    }
}
