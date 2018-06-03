<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'super-admin', 'label' => 'Super Admin'],
            ['name' => 'instructor', 'label' => 'Instructor'],
            ['name' => 'student', 'label' => 'Student'],
        ]);
    }
}
