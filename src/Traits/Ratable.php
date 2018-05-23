<?php

namespace UniSharp\Ratable\Traits;

use UniSharp\Ratable\Models\Rate;

trait Ratable
{
    public static function bootRatable()
    {
        static::deleting(function ($model) {
            $model->rates()->delete();
        });
    }

    public function rates()
    {
        return $this->morphMany(Rate::class, 'ratable');
    }

    public function average()
    {
        return $this->rates()->avg('grade');
    }
}
