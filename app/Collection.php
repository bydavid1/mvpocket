<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = ['name', 'description', 'users_id', 'image'];

    public function theme(){
        return $this->belongsTo("App\Theme");
    }
}
