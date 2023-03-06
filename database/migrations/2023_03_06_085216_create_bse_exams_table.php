<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBseExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bse_exams', function (Blueprint $table) {
            $table->id();
            $table->integer('stu_id')->nullable();
            $table->string('year')->nullable();
            $table->string('name_of_exam')->nullable();
            $table->string('roll_no')->nullable();
            $table->string('regd_no')->nullable();
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
        Schema::dropIfExists('bse_exams');
    }
}
