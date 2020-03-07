<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    public function notebook(){
        return $this->belongsTo(Notebook::class);
    }
}
