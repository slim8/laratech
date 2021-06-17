<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function theme(){
        return $this->belongsTo('App\Theme');
    }
    public function reponses(){
        return $this->hasMany('App\Reponse');
    }
}
