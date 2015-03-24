<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = array('name');

    public static $rules = array('name' => 'required|min:3, unique|max:255');
}











