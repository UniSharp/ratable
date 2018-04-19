<?php

namespace UniSharp\Ratable\Tests\Faker\Models;

use Illuminate\Database\Eloquent\Model;
use UniSharp\Ratable\Traits\Ratable;

class Rate extends \UniSharp\Ratable\Models\Rate
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
