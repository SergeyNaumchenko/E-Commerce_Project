<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class User_role extends Model {

    protected $table = 'user_roles';

    public function users()
    {
        return $this->hasMany('App\User');
    }

}
