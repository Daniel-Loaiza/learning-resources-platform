<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resource>
 */
class ResourceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'title'=> $this -> faker -> sentence,
            'category_id'=> Category::factory(),
            'description'=> $this -> faker -> paragraph,
            'link'=> $this -> faker -> url,
            'creator_id'=> User::factory(),
        ];
    }
}
