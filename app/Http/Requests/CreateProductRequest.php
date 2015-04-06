<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateProductRequest extends Request {

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
            'category_id'  => 'required|integer',
            'title'        => 'required|min:2|unique:products',
            'description'  => 'required|min:2',
            'price'        => 'required|numeric',
            'availability' => 'integer',
            'image'        => 'required|image|mimes:jpeg, jpg, bmp, png, gif'
		];
	}

}
