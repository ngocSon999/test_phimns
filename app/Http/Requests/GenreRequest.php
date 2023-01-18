<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Request;

class GenreRequest extends FormRequest
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
    public function rules(Request $request)
    {

        return [
            'title'=>'required|max:255|unique:countries,title,',
            'description'=>'required|max:255',
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>':attribute bắt buộc phải nhập',
            'title.max'=>':attribute không được vượt quá :max ký tự',
            'title.unique'=>':attribute đã tồn tại trong hệ thống',
            'description.required'=>':attribute bắt buộc phải nhập',
            'description.max'=>':attribute không được vượt quá :max ký tự',
        ];
    }
    public function attributes()
    {
        return [
            'title'=>'Thể loại phim',
            'description'=>'Nội dung mô tả',
        ];
    }
}
