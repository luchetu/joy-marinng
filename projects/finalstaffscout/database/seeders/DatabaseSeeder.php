<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CompanyTypeTableSeeder::class);
        $this->command->info('companies_type table seeded!');

        $this->call(ContractTypeTableSeeder::class);
        $this->command->info('contracts_type table seeded!');

        $this->call(EducationLevelTableSeeder::class);
        $this->command->info('education_level table seeded!');

        $this->call(ExperienceTableSeeder::class);
        $this->command->info('experiences table seeded!');

        $this->call(IndustryTableSeeder::class);
        $this->command->info('industries table seeded!');

        $this->call(SpecialityTableSeeder::class);
        $this->command->info('specialities table seeded!');

        $this->call(AdminTableSeeder::class);
        $this->command->info('admin table seeded!');
    }
}
