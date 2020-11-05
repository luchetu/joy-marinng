<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceTableSeeder extends Seeder
{

    public function run()
    {
        // DB::table('experiences')->delete();
        $types = array(
            'Entry Level - Semi or Skilled Worker',
            'Entry Level - Professional',
            'Experienced  - Semi or  Skilled worker',
            'Experienced - Professional',
            'Supervisor/Low Level Manager',
            'Mid Level Manager',
            'Executive/Director/Senior Manager'
        );
        foreach ($types as $type) {
            Experience::create(['experiences_name' => $type]);
        }
    }
}
