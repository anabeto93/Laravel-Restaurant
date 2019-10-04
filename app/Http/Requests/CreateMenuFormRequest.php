<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Rules\RestaurantCategoryValidateRule as RestaurantCategoryValidate;

class CreateMenuFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::check()) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['bail','required', 'string','min:3'],
            'description' => ['bail','required', 'string','min:10'],
            'restaurant_id' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'category' => ['required', new RestaurantCategoryValidate(request('restaurant_id'))]
        ];
    }
}
