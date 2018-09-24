<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name'];

    protected $with = ['players'];

    public function players()
    {
        return $this->hasMany('App\Player');
    }
}
