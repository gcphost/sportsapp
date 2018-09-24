<?php

use Illuminate\Database\Seeder;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Team::class, 10)->create()->each(function($model) {
            $model->players()->createMany(factory(App\Player::class, 10)->make()->toArray());
        });
    }
}
