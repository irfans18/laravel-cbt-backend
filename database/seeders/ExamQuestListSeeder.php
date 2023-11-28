<?php

namespace Database\Seeders;

use App\Models\ExamQuestList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExamQuestListSeeder extends Seeder
{
   /**
    * Run the database seeds.
    */
   public function run(): void
   {
      ExamQuestList::factory()->count(200)->create();
   }
}
