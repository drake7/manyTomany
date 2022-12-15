<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('enrollments', function(Blueprint $table) {
            // $table->foreignId('courses_id')->constrained()->index();
            $table->unsignedBigInteger('courses_id');
            $table->unsignedBigInteger('students_id');
            $table->foreign('courses_id','courses_fk')->references('id')->on('courses');
            $table->foreign('students_id','students_fk')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
