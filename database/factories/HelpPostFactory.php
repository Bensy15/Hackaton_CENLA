<?php

namespace Database\Factories;

use App\Models\HelpPost;
use App\Models\Volunteer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HelpPost>
 */
class HelpPostFactory extends Factory
{
    protected $model = HelpPost::class;
    public function definition(): array
    {
        $helpTypes = [
            'Нужна помощь с переездом',
            'Требуется помощь пожилому человеку',
            'Помощь с ремонтом',
            'Помощь с уборкой',
            'Требуется сопровождение',
            'Нужна помощь с покупками',
            'Помощь с домашними животными',
            'Требуется юридическая консультация'
        ];

        $descriptions = [
            'Срочно требуется помощь, так как не справляюсь один.',
            'Ищу добровольца, который мог бы уделить время.',
            'Готов(а) оплатить расходы, нужна физическая помощь.',
            'Требуется помощь на регулярной основе.',
            'Разовая помощь, займет не более 2 часов.'
        ];

        return [
            'user_name' => fake()->name(),
            'heading' => $this->faker->randomElement($helpTypes),
            'importance' => $this->faker->boolean(30), // 30% chance of being true (important)
            'txt' => $this->faker->randomElement($descriptions) . "\n\n" . 
                   $this->faker->paragraph(3),
            'volunteer_id' => Volunteer::inRandomOrder()->first()?->id ?? 
                             Volunteer::factory(),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];

    }
    public function important(): static
    {
        return $this->state(fn (array $attributes) => [
            'importance' => true,
        ]);
    }

    public function notImportant(): static
    {
        return $this->state(fn (array $attributes) => [
            'importance' => false,
        ]);
    }

    public function withSpecificVolunteer(int $volunteerId): static
    {
        return $this->state(fn (array $attributes) => [
            'volunteer_id' => $volunteerId,
        ]);
    }
}
