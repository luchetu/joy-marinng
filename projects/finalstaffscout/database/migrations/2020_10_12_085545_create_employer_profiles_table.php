<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployerProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('employer_profiles');

        Schema::create('employer_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('company_name',200);
            $table->char('tag_line',200);
            $table->text('description');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('industries_id');
            $table->unsignedBigInteger('company_types_id');
            $table->foreign('users_id')->references('id')->on('users')
            ->onDelete('cascade');
            $table->foreign('industries_id')->references('id')->on('industries')
            ->onDelete('cascade');
            $table->foreign('company_types_id')->references('id')->on('company_types')
            ->onDelete('cascade');
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
        Schema::dropIfExists('employer_profiles');
    }
}
