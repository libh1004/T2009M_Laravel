<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "author_id" => random_int(1,20),
            "title" => $this->faker->name(),
            "isbn"=> $this->faker->text(100),
            "pub_year" => random_int(1,10),
            "available" => random_int(1,15),
        ];
    }
}
