<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Role::create(['name'=>'author']);

        Role::create(['name'=>'admin']);
        $admin=User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make(12345678910)
        ]);
        $admin->syncRole('admin');
        Role::create(['name'=>'editor']);
        $editor=User::create([
            'name'=>'editor',
            'email'=>'editor@gmail.com',
            'password'=>Hash::make(12345678910)
        ]);
        $editor->syncRole('editor');


    }
}