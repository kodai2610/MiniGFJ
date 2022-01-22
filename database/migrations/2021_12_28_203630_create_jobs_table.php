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
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('display_message');
            $table->string('img');
            $table->string('location');
            $table->integer('salary_type');
            $table->integer('salary_min');
            $table->integer('salary_max');
            $table->text('content');
            $table->text('work_hour');
            $table->text('background'); 
            $table->text('license');
            $table->text('day_off');
            $table->integer('company_id');
            $table->integer('occupation_id');
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
