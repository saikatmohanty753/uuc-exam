<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUgstudentmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ugstudentmarks', function (Blueprint $table) {
            $table->id();
            $table->integer('stu_id')->nullable();
            $table->integer('app_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->integer('course_id')->nullable();
            $table->integer('semester')->nullable();
            $table->integer('subject_id')->nullable();
            $table->string('secure_mark')->nullable();
            $table->string('practical_mark')->nullable();
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
        Schema::dropIfExists('ugstudentmarks');
    }
}
