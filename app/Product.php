<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $fillable = ['category_id', 'title', 'description', 'price', 'availability', 'image', 'quantity'];


    public function category() {
        return $this->belongsTo('Category');
    }
}
