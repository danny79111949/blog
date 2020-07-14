<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreBlogPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $post = request()->post;
        if(!isset($post))
            return true;
        if($post->user_id === Auth::id())   
            return true;
        else
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
            'title'=>'required|max:255',
            'content'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'標題為必填',
            'title.max'=>'標題過長',
            'content.required'=>'內容為必填',
        ];
    }
}
