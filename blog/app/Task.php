<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Task extends Model
{
    protected $table ='tasks';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
