<?php


namespace App\Http\Requests;

use App\Http\Requests\Traits\CustomErrorMessage;
use Illuminate\Foundation\Http\FormRequest;

class CommentAddRequest extends FormRequest
{

    use CustomErrorMessage;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [
            'post_id' => 'required|integer',
            'body' => 'required'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [];
    }

}
