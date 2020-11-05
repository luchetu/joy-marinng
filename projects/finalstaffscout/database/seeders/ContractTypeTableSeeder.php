<?php

namespace Database\Seeders;

use App\Models\ContractType;
use Illuminate\Database\Seeder;

class ContractTypeTableSeeder extends Seeder
{

  public function run()
  {
    //DB::table('contract_types')->delete();
    $types = array(
      'Temporary/Casual',
      'Part Time',
      'Internship',
      'Freelance',
      'Consultant',
      'Fixed Term Contract',
      'Full Time'
    );
    foreach ($types as $type) {
      ContractType::create(['contract_types_name' => $type]);
    }
  }
}
