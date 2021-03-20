<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'          => $this->faker->sentence(),
            'url'           => 'https://youtu.be/JWbOh_wUolY',
            'iframe'        => '<iframe width="746" height="420" src="https://www.youtube.com/embed/JWbOh_wUolY?list=PLZ2ovOgdI-kX3XFj77zlvSQYhJyJSYQWr" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'platform_id'   => 1
        ];
    }
}
