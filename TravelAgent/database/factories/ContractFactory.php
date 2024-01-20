<?php

namespace Database\Factories;

use App\Models\Accommodation;
use App\Models\Contract;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contract>
 */
class ContractFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $id = Accommodation::inRandomOrder()->first('id');
        $rates = Accommodation::find($id)->value('rates');
        $user = User::inRandomOrder()->first();
        $user->id;
        $user->save();
        $accommodation = Accommodation::inRandomOrder()->first();
        $accommodation->id;
        return [
            'rates' => $rates,
            'name' => $this->faker->name(),
            'agent_id' => $user,
            'start_date' => $this->faker->date(),
            'end_date' =>$this->faker->date(),
            'accommodation_id' =>$id,
        ];
    }
}
