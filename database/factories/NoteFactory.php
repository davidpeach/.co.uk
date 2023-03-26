<?php

declare (strict_types=1);

namespace Database\Factories;

use App\Contracts\Streamable;
use App\Models\StreamItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => $this->faker->sentence(),
        ];
    }

    public function configure(): Factory
    {
        return $this->afterCreating(function (Streamable $streamable) {
            StreamItem::factory()->create([
                'streamable_id' => $streamable->id,
                'streamable_type' => get_class($streamable),
            ]);
        });
    }
}
