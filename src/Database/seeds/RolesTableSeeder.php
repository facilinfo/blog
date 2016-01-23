<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ROLES
        DB::table('roles')->insert([
            'name' => 'Super Admin',
            'slug' => 'super.admin',
            'description' => 'Super Administrateur', // optional
            'level' => 50, // optional, set to 1 by default
        ]);

        DB::table('roles')->insert([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Administrateur', // optional
            'level' => 40, // optional, set to 1 by default
        ]);

        DB::table('roles')->insert([
            'name' => 'Auteur',
            'slug' => 'author',
            'description' => 'Auteur', // optional
            'level' => 20, // optional, set to 1 by default
        ]);

        DB::table('roles')->insert([
            'name' => 'Abonné',
            'slug' => 'subscriber',
            'description' => 'Abonné', // optional
            'level' => 1, // optional, set to 1 by default
        ]);
    }
}
