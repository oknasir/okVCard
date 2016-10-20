<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'provider_id', 'provider', 'nickname', 'name', 'email', 'avatar', 'bio',
    ];

    /**
     * Get the user who owns the provider.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
