<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreBoardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
       return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'board_name' => 'required|string|max:255|min:5',
            'board_description' => 'required|string|max:255|min:10',
            'user_id' => 'required|exists:users,id',
        ];
    }

    public function messages(){
        return [
            'board_name.required' => 'قم بأدخال أسم اللوحة',
            'board_name.string'=>'أسم اللوحة يجب أن يكون نصا',
            'board_name.min'=>'يبدو أن أسم اللوحة صغيرآ جدا أدخل أسم يحتوي على 5 أحرف على الأقل',
            'board_name.max'=>'يبدو أن الأسم طويلا جدا يجب ان يحتوي على 255 حرفا على الأكثر',
            'board_description.max'=>'يبدو أن ,الوصف طويلا جدا يجب ان يحتوي على 255 حرفا على الأكثر',
            'board_description.min'=>'يبدو أن الوصف صغيرا جدا يجب ان يحتوي على 10 حرفا على الأقل',
            'board_description.required'=>'قم بأدخال وصف للوحة',
            'board_description.string'=>'وصف اللوحة يجب ان يكون نصا',
            ];
    }
}
