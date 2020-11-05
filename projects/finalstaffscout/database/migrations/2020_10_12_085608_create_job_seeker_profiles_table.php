<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobSeekerProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ( !Schema::hasTable('users') ) {
        Schema::create('job_seeker_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('experiences_id')->unsigned();
            $table->char('minimum_salary',200);
            $table->text('description');
            $table->json('social_links');
            $table->text('website_url');
            $table->char('city',100);
            $table->char('address',200);
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('languages_id');
            $table->unsignedBigInteger('education_levels_id');
            $table->unsignedBigInteger('specialities_id');
            $table->foreign('users_id')->references('users_id')->on('users')
            ->onDelete('cascade');
            $table->foreign('languages_id')->references('languages_id')->on('languages')
            ->onDelete('cascade');
            $table->foreign('education_levels_id')->references('id')->on('education_levels')
            ->onDelete('cascade');
            $table->foreign('education_levels_id')->references('id')->on('education_levels')
            ->onDelete('cascade');
            $table->foreign('experiences_id')->references('id')->on('experiences')
            ->onDelete('cascade');
            $table->foreign('specialities_id')->references('id')->on('specialities')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_seeker_profiles');
    }
}
