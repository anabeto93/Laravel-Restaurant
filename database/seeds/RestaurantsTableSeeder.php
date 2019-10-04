<?php

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Seeder;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!app()->environment(['production', 'staging'])) {
            User::all()->each(function($user) {
                factory(Restaurant::class, 10)->create([
                    'owner_id' => $user->id
                ]);
            });
        }
    }
}
