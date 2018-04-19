<?php

namespace UniSharp\Ratable\Tests\Faker\Models;

use Illuminate\Database\Eloquent\Model;
use UniSharp\Ratable\Traits\Ratable;

class Movie extends Model
{
    use Ratable;

    protected $fillable = ['name'];
}
