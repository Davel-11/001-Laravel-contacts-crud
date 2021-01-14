<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDirectorioRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        // dd( $this->route('directorio')->id );
        return [
            'nombre' => 'required|min:5|max:100'
        ];
    }

}
