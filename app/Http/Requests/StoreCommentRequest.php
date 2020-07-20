<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
        return [
            'name'=>'required|max:255',
            'comment'=>'required',
            'post_id'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'名稱為必填',
            'name.max'=>'名稱過長',
            'comment.required'=>'留言為必填',
            'post_id.required'=>'文章id為必填',
        ];
    }
}
