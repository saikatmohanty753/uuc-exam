<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntryExcelFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entry_excel_files', function (Blueprint $table) {
            $table->id();
            $table->string('excel_doc')->nullable();
            $table->integer('sem_entry_id')->nullable();
            $table->integer('sem_no')->nullable();
            $table->integer('course_id')->nullable();
            $table->integer('clg_id')->nullable();
            $table->string('batch')->nullable();
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
        Schema::dropIfExists('entry_excel_files');
    }
}
