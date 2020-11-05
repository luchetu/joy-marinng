<?php

namespace Database\Seeders;

use App\models\EducationLevel;
use Illuminate\Database\Seeder;

class EducationLevelTableSeeder extends Seeder
{

  public function run()
  {
    //DB::table('education_levels')->delete();
    $levels = array(
      'High School Certificate',
      'Certificate',
      'Diploma',
      'Advance Diploma',
      'Bachelors Degree',
      'Masters Degree',
      'PhD'
    );
    foreach ($levels as $level) {
      EducationLevel::create(['education_levels_name' => $level]);
    }
  }
}
