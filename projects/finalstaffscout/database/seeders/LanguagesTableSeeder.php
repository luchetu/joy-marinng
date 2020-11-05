<?php

namespace Database\Seeders;

use App\Models\Languages;
use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{

  public function run()
  {
    //DB::table('company_types')->delete();
    $types = array(
      'English',
      'Swahili',
      'French',

    );
    foreach ($types as $type) {
      Languages::create(['languages_name' => $type]);
    }
  }
}
