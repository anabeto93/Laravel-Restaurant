<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!app()->environment(['production', 'staging'])) {
            factory(User::class)->create([
                'name' => 'Richard Opoku',
                'email' => 'test@admin.com',
                'password' => Hash::make('password')
            ]);
        }
    }
}
