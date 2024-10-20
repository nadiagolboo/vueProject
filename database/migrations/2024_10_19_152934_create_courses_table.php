<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_code')->unique();
            $table->string('course_name');
            $table->unsignedBigInteger('prerequisite_course_id')->nullable();
            $table->integer('credits');
            $table->timestamps();
            $table->foreign('prerequisite_course_id')->references('id')->on('courses')->onDelete('set null');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
