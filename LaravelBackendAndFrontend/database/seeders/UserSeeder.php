<?php

namespace Database\Seeders;

use App\Models\Accommodation;
use App\Models\Contract;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Container\Container;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{     /**
     * Number of users to create
     *
     */
    public $users = 10;
    /**
     * The current Faker instance.
     *
     * @var Generator
     */
    protected $faker;
    /**
     * Languages
     */

    /**
     * Create a new seeder instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    /**
     * Get a new Faker instance.
     *
     * @return Generator
     */
    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * $users is the number of users to create
         *
         * For each
         */

        for ($i = 1; $i <= $this->users; $i++) {

            $name = $this->faker->firstName() . ' ' . $this->faker->lastName();

            $email = $i . '@gmail.com';

            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make('password'),
                'email_verified_at' => Carbon::now()->addMinute(),
            ]);

            $accommodation = Accommodation::inRandomOrder()->first();

            Contract::create([
            'rates' => $accommodation->rates,
            'name' => $this->faker->name(),
            'agent_id' => $user->id,
            'start_date' => $this->faker->date(),
            'end_date' =>$this->faker->date(),
            'accommodation_id' =>$accommodation->id,

            ]);

    }

}

}
