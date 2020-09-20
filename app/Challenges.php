<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenges extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'email', 'created_at', 'updated_at'
    ];

    protected $table = 'challenges';
}
