<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $fillable = ['category_id', 'title', 'description', 'price', 'availability', 'image'];

    public static $rules = [

        'category_id'  => 'required|integer',
        'title'        => 'required|min:2',
        'description'  => 'required|min:2',
        'price'        => 'required|numeric',
        'availability' => 'integer',
        'image'        => 'required|image|mimes:jpeg, jpg, bmp, png, gif'
    ];

    public function category() {
        return $this->belongsTo('Category');
    }

}
