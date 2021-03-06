<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable=['task','description','done','deadline'];
    public $timestamps=true;

    public function likes(){
        return $this->hasMany('App\Like');
    }
}
