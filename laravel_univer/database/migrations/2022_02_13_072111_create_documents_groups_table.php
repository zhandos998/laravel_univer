<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents_groups', function (Blueprint $table) {
            $table->id();
            $table->integer("group_id");
            $table->integer("teacher_id");
            $table->integer("subject_id");
            $table->date("date_from");
            $table->string("title");
            $table->string("document");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents_groups');
    }
}
