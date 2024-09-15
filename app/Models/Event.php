<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    
    /**
     * The table associated with the model.
     *
     * @var string
     */


    protected $table ='event';

    protected $guarded = [];

    protected $casts = [
        'items' => 'array'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
