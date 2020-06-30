<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamTagPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_tag', function (Blueprint $table) {
            $table->unsignedInteger('exam_id');

            $table->foreign('exam_id', 'exam_id_fk_666')->references('id')->on('exams')->onDelete('cascade');

            $table->unsignedInteger('tag_id');

            $table->foreign('tag_id', 'tag_id_fk_666')->references('id')->on('tags')->onDelete('cascade');
            
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
        Schema::table('exam_tag', function (Blueprint $table) {
            Schema::dropIfExists('exam_tag');
        });
    }
}
