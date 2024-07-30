<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
        switch (request()->method()) {
            case 'PATCH':
                return [
                  
                    'organization_name'=>'required|string|max:255',
                    'order_num'=>'required|string|max:255',
                    'price_after_discount'=>'required|string|max:255',
                    'discount'=>'required|string|max:255',
                    'client_name'=>'required|string|max:255',
                    'package'=>'required|string|max:255',
                    'serial_num'=>'required|string|max:255',
                    
                ];
                break;

            default:
                return [
                    'organization_name'=>'required|string|max:255',
                    'order_num'=>'required|string|max:255',
                    'price_after_discount'=>'required|string|max:255',
                    'discount'=>'required|string|max:255',
                    'client_name'=>'required|string|max:255',
                    'package'=>'required|string|max:255',
                    'serial_num'=>'required|string|max:255',
                    
                ];
                break;
        }
    }
}
