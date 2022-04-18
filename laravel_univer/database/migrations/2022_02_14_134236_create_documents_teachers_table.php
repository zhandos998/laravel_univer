<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents_teachers', function (Blueprint $table) {
            $table->id();
            $table->integer("student_id");
            $table->integer("teacher_id");
            $table->integer("subject_id");
            $table->integer("document_id");
            $table->string("document");
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
        Schema::dropIfExists('documents_teachers');
    }
}
