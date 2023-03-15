<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemesterDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semester_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('stu_id')->nullable();
            $table->integer('semester_no')->nullable();
            $table->integer('payment_status')->default(0)->nullable();
            $table->integer('mid_semester')->nullable();
            $table->integer('total_mark')->nullable();
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
        Schema::dropIfExists('semester_details');
    }
}
