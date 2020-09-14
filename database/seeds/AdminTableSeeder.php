<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Admin::create([
            'username'  => 'adminNusaShop2701',
            'name'      => 'Admin',
            'password'  => 'adminNusaShop'
        ]);
    }
}
