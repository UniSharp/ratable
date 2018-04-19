<?php

namespace UniSharp\Ratable\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = ['user_id', 'grade', 'description'];

    protected $with = ['user', 'ratable'];

    public static function boot()
    {
        static::creating(function ($rate) {
            if (is_null($rate->user_id)) {
                $rate->user_id = auth()->id();
            }
        });
    }

    public function ratable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
