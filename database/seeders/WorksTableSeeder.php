<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('pl_PL');    //pl_PL spowoduje ze dane bd polskie

        for($i =1; $i<=4; $i++)
        {
            DB::table('works')->insert([

                //w rental_day_in pojawia sie jakies daty 10 dni wstecz od teraz
                'work_day_in' => $faker->dateTimeBetween('-10 days', 'now'),
                'work_day_out' => $faker->dateTimeBetween('now', '+10 days'),
                'work_time_in' => $faker->time('08:00:00'),
                'work_time_out' => $faker->time('16:00:00'),
                'user_id' => $faker->numberBetween(2,5),

            ]);
        }
    }
}
