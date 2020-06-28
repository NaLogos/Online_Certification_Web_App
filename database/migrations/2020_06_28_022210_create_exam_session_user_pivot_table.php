<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamSessionUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_session_user', function (Blueprint $table) {
            $table->unsignedInteger('user_id');

            $table->foreign('user_id', 'user_id_fk_2')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedInteger('exam_id');

            $table->foreign('exam_id', 'exam_id_fk_2')->references('id')->on('exams')->onDelete('cascade');
            
            $table->unsignedInteger('session_id');

            $table->foreign('session_id', 'session_id_fk_2')->references('id')->on('sessions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exam_session_user', function (Blueprint $table) {
            Schema::dropIfExists('exam_session_user');
        });
    }
}
