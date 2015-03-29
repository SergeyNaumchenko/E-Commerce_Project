<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
//    protected $guarded = ['id'];

    protected $fillable = ['name'];


    public static $rules = array('name' => 'required|min:3|unique:categories');
}











