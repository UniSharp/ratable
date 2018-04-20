# Ratable

Provide a trait to multiple models to rate easliy.

## Installation

```
composer require unisharp/ratable dev-master
```

## Configuration

Set provider modules in `config/app.php`

```php
return [
    'providers' => [
          UniSharp\Ratable\Providers\RatableServiceProvider:class
    ]
];
```

## Usages

Use trait in the model

```php

namespace App;

use Illuminate\Database\Eloquent\Model;
use UniSharp\Ratable\Traits\Ratable;

class Movie extends Model
{
    use Ratable;
}
```

Rate your model with grade and/or description

```php

$movie = new Movie();

$movie->rates()->create([
  'grade' => 10,
  'description' => 'Excellent'
]);

```

Get your model's average rate

```php

$movie = new Movie();

$movie->rates()->saveMany(
  new UniSharp\Ratable\Models\Rate(['grade' => 10, 'description' => 'Excellent'],
  new UniSharp\Ratable\Models\Rate(['grade' => 5, 'description' => 'Not Bad']
);

$movie->average()  // 7.5

```

Get a rate's giver and model

```php
$movie = new Movie();

$rate = $movie->rates()->create([
  'grade' => 10,
  'description' => 'Excellent'
]);

// giver
$rate->user;

// model
$rate->ratable;
```



