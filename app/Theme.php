<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $table = 'themes';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function questions(){
        return $this->hasMany('App\Question');
    }
}
