<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
   /**
    * Run the database seeds.
    */
   public function run(): void
   {

      \App\Models\User::factory(10)->create();
      \App\Models\User::factory(10)->create(
         [
            'roles' => 'STAFF',

         ]
      );

      \App\Models\User::factory()->create([
         'name' => 'Irfams',
         'email' => 'irfams@fic10.com',
         'password' => Hash::make('123qwe'),
         'roles' => 'ADMIN',
         'phone' => '08798273892',
      ]);
   }
}
