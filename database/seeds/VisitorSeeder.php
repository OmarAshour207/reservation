<?php

use Illuminate\Database\Seeder;

class VisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Visitor::create([
            'ip'    => '127:0:0:1',
            'page'  => 'home'
        ]);
    }
}
