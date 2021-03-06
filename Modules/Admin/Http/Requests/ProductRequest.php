<?php

declare(strict_types=1);

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * The product validation rules.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
                case 'GET':
                case 'DELETE': {
                        return [];
                    }
                case 'POST': {
                        return [
                            'product_title'     => "required" ,
                            'product_category'  => 'required',
                            'description'       => 'required',
                            'price'             => 'required|numeric|min:0', 
                            'available_stocks'  => 'numeric',
                            'totla_stocks'      => 'numeric',
                            'photo'             => 'required|mimes:jpeg,bmp,png,gif',
                            'images.*'          => 'mimes:jpeg,bmp,png,gif'
                        ];
                    }
                case 'PUT':
                case 'PATCH': {

                        return [
                            'product_title'     => "required",
                            'product_category'  => 'required',
                            'description'       => 'required',
                            'price'             => 'required|numeric|min:0', 
                            'available_stocks'  => 'numeric',
                            'totla_stocks'      => 'numeric',
                            'photo'             => 'mimes:jpeg,bmp,png,gif',
                            'images.*'          => 'mimes:jpeg,bmp,png,gif'
                        ];

                }
                default:break;
            }
        //}
    }

    /**
     * The
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
