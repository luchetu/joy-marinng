<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('jobs_title',200);
            $table->boolean('is_active');
            $table->longText('jobs_description');
            $table->boolean('is_company_name_hidden');
            //$table->foreignId('contract_types_id')->constrained('contract_types');
            //$table->foreignId('education_levels_id')->constrained('education_levels');
            //$table->foreignId('experiences_id')->constrained('experiences');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
