<?php

use Illuminate\Database\Seeder;
use App\Theme;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new Theme();
        $user->name = 'danger';
        $user->save();

        $user = new Theme();
        $user->name = 'info';
        $user->save();

        $user = new Theme();
        $user->name = 'success';
        $user->save();

        $user = new Theme();
        $user->name = 'warning';
        $user->save();

        $user = new Theme();
        $user->name = 'dark';
        $user->save();

        $user = new Theme();
        $user->name = 'primary';
        $user->save();
    }
}
