<?php

namespace Database\Factories;

use App\Models\Incident;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class IncidentFactory extends Factory
{
    protected $model = Incident::class;

    public function definition(): array
    {
        $sev = $this->faker->randomElement(['low','medium','high','critical']);
        $st  = $this->faker->randomElement(['open','in_progress','resolved','closed']);
        return [
            'code'        => 'INC-'.now()->format('ymd').'-'.str_pad($this->faker->unique()->numberBetween(1,9999),4,'0',STR_PAD_LEFT),
            'title'       => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(),
            'severity'    => $sev,
            'status'      => $st,
            'reporter_id' => User::inRandomOrder()->value('id') ?? User::factory(),
            'assignee_id' => User::inRandomOrder()->value('id'),
            'opened_at'   => now()->subDays(rand(0,7)),
            'resolved_at' => in_array($st,['resolved','closed']) ? now()->subDays(rand(0,3)) : null,
        ];
    }
}
