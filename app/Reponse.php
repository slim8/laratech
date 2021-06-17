<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    protected $table = 'reponses';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function question(){
        return $this->belongsTo('App\Question');
    }
}
