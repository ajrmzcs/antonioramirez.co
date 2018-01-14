<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'Administrator',
            'slug' => 'admin',
            'permissions' => [
                'all' => true,
            ]
        ]);
        $author = Role::create([
            'name' => 'Author',
            'slug' => 'author',
            'permissions' => [
                'posts-all' => true,
                'categories-all' => true,
            ]
        ]);
    }
}
