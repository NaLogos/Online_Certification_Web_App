<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToExamsTable extends Migration
{

    public function up()
    {
        Schema::table('exams', function (Blueprint $table) {
            $table->unsignedInteger('category_id');

            $table->foreign('category_id', 'category_fk_773713')->references('id')->on('categories');

        });
    }
}


