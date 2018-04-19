<?php

namespace UniSharp\Ratable\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use UniSharp\Ratable\Models\Rate;
use UniSharp\Ratable\Tests\Faker\Models\Movie;
use UniSharp\Ratable\Tests\Faker\Models\User;
use UniSharp\Ratable\Tests\TestCase;

class RatableTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
    }

    public function testCreatRate()
    {
        $user = User::create(['name' => 'foo']);
        $movie = Movie::create(['name' => 'foo']);

        $rate = $movie->rates()->create([
            'user_id' => $user->id,
            'grade' => 10,
            'description' => 'Great'
        ]);

        $this->assertDatabaseHas('users', $user->toArray());
        $this->assertDatabaseHas('movies', $movie->toArray());
        $this->assertDatabaseHas('rates', $rate->toArray());
    }

    public function testUpdateRate()
    {
        $rate = Movie::create(['name' => 'foo'])->rates()->create($old = [
            'user_id' => User::create(['name' => 'foo'])->id,
            'grade' => 10,
            'description' => 'Great'
        ]);

        $this->assertDatabaseHas('rates', $old);

        $rate->update($new = [
            'grade' => 20,
            'description' => 'Bad'
        ]);

        $this->assertDatabaseMissing('rates', $old);
        $this->assertDatabaseHas('rates', $new);
    }

    public function testDeleteRate()
    {
       $rate = Movie::create(['name' => 'foo'])->rates()->create([
            'user_id' => User::create(['name' => 'foo'])->id,
            'grade' => 10,
            'description' => 'Great'
        ]);

       $this->assertDatabaseHas('rates', $rate->toArray());

       $rate->delete();

       $this->assertDatabaseMissing('rates', $rate->toArray());
    }

    public function testAverage()
    {
        $grades = [10, 5];
        $movie = Movie::create(['name' => 'foo']);

        $movie->rates()->create([
            'user_id' => User::create(['name' => 'foo'])->id,
            'grade' => $grades[0],
            'description' => 'Great'
        ]);

        $movie->rates()->create([
            'user_id' => User::create(['name' => 'foo'])->id,
            'grade' => $grades[1],
            'description' => 'So So'
        ]);

        $this->assertEquals(array_sum($grades)/count($grades), $movie->average());
    }
}
