<?php

namespace Database\Seeders;

use App\Models\CompanyType;
use Illuminate\Database\Seeder;

class CompanyTypeTableSeeder extends Seeder
{

  public function run()
  {
    $types = array(
      'Public Company',
      'Self-employed',
      'Government Agency',
      'Nonprofit',
      'Sole Proprietorship',
      'Privately Held',
      'Partnership',
    );
    foreach ($types as $type) {
      CompanyType::create(['company_types_name' => $type]);
    }
  }
}
