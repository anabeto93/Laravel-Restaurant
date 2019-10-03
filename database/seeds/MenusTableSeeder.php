<?php

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!app()->environment(['production', 'staging'])) {
            factory(Menu::class, 10)->create();
        }
    }
}
