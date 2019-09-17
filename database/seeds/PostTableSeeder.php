<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<10; $i++) {
            $faker = Faker::create('tr_TR');
            DB::table('post')->insert([
                'title' => Str::random(10),
                'body' => $faker->text,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'user_id' => 1,
            ]);
        }

    }
}
