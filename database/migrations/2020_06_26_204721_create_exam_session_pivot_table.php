<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamSessionPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_session', function (Blueprint $table) {
            $table->unsignedInteger('session_id');

            $table->foreign('session_id', 'session_fk_1')->references('id')->on('sessions')->onDelete('cascade');

            $table->unsignedInteger('exam_id');

            $table->foreign('exam_id', 'exam_id_fk_1')->references('id')->on('exams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_session');
    }
}
