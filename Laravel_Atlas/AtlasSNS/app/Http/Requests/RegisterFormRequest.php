<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //[ *1.変更：default=false ]
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       //[ *2.追加：Validationルール記述箇所 ]
        return [
          'username' => ['min:2','max:12'],
          'password' => ['min:8','max:20','unique:users'],
          'images'=>['file','mimes:jpeg,png,jpg,bmb','max:2048'],
        ];
    }

    //[ *3.追加：Validationメッセージを設定（省略可） ]
    //function名は必ず「messages」となる。
    public function massages(){
      return[
        'username.required'  => 'attributesを入力してください。',
        'username.min'  => 'attributesは2文字以上でお願いします。',
        'username.max'  => 'attributesは12文字以内でお願いします。',
        'mail.required'  => 'attributesを入力してください。',
        'mail.min'  => 'attributesは5文字以上でお願いします。',
        'mail.max'  => 'attributesは40文字以内でお願いします。',
      ];
    }
}
