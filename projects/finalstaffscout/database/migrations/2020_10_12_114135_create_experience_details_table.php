<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperienceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experience_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('is_current_job');
            $table->date('start_date');
            $table->date('end_date');
            $table->date('job_title');
            $table->date('company_name');
            $table->char('job_location_city',200);
            $table->char('job_location_state',200);
            $table->char('job_location_county',200);
            $table->char('country_code',200);
            $table->char('description');
            // $table->foreign('users_id')
            // ->references('users_id')->on('users')
            // ->onDelete('cascade');
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
        Schema::dropIfExists('experience_details');
    }
}
