<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('intern_skills', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('intern_id');
            $table->foreign('intern_id')->references('id')->on('interns')->onDelete('cascade');

            $table->unsignedBigInteger('skill_id');
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');

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
        Schema::dropIfExists('intern_skills');
    }
}
