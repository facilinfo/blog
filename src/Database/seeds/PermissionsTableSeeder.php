<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //USERS
        DB::table('permissions')->insert([
            'name' => 'Créer des utilisateurs',
            'slug' => 'create.users',
            'model' => 'App\User',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Editer des utilisateurs',
            'slug' => 'edit.users',
            'model' => 'App\User',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Supprimer des utilisateurs',
            'slug' => 'delete.users',
            'model' => 'App\User',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Afficher des utilisateurs',
            'slug' => 'show.users',
            'model' => 'App\User',
        ]);

        //POSTS
        DB::table('permissions')->insert([
            'name' => 'Créer des articles',
            'slug' => 'create.posts',
            'model' => '\Facilinfo\Blog\Models\BlogPost',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Editer des articles',
            'slug' => 'edit.posts',
            'model' => '\Facilinfo\Blog\Models\BlogPost',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Supprimer des articles',
            'slug' => 'delete.posts',
            'model' => '\Facilinfo\Blog\Models\BlogPost',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Afficher des articles',
            'slug' => 'show.posts',
            'model' => '\Facilinfo\Blog\Models\BlogPost',
        ]);

        //CATEGORIES
        DB::table('permissions')->insert([
            'name' => 'Créer des catégories',
            'slug' => 'create.categories',
            'model' => '\Facilinfo\Blog\Models\BlogCategory',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Editer des catégories',
            'slug' => 'edit.categories',
            'model' => '\Facilinfo\Blog\Models\BlogCategory',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Supprimer des catégories',
            'slug' => 'delete.categories',
            'model' => '\Facilinfo\Blog\Models\BlogCategory',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Afficher des catégories',
            'slug' => 'show.categories',
            'model' => '\Facilinfo\Blog\Models\BlogCategory',
        ]);

    }
}
