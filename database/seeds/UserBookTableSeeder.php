<?php

use Illuminate\Database\Seeder;

class UserBookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_book')->insert([
            ['user_id' => 1, 'isbn' => '9784863542457', 'type' => 'paper'],
            ['user_id' => 1, 'isbn' => '9784798052588', 'type' => 'kindle'],
            ['user_id' => 1, 'isbn' => '9784297100209', 'type' => 'paper'],
            ['user_id' => 1, 'isbn' => '9784774184111', 'type' => 'paper'],
            ['user_id' => 1, 'isbn' => '9784797372212', 'type' => 'pdf'],
            ['user_id' => 1, 'isbn' => '9784798059075', 'type' => 'kindle'],
            ['user_id' => 1, 'isbn' => '9784822298944', 'type' => 'paper'],
            ['user_id' => 1, 'isbn' => '9784798041797', 'type' => 'paper'],
            ['user_id' => 1, 'isbn' => '9784774180946', 'type' => 'paper'],
            ['user_id' => 1, 'isbn' => '9784802611145', 'type' => 'kindle'],
        ]);
    }
}
