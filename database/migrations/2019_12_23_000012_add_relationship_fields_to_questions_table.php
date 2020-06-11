<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToQuestionsTable extends Migration
{
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->unsignedInteger('exam_id');

            $table->foreign('exam_id', 'exam_fk_773714')->references('id')->on('exams');
        });
    }
}
