<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable=['task_id'];
    public $timestamps=true;

    public function task(){
        return $this->belongsTo('App\Task');
    }
}
