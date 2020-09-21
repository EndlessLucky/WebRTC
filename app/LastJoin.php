<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LastJoin extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'email', 'debate_id', 'debate_topic', 'created_at', 'updated_at'
    ];

    protected $table = 'last_join';
}
