<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('comment');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('review_id')->nullable();
            $table->unsignedInteger('make_request_id')->nullable();
            $table->unsignedInteger('company_id')->nullable();
            $table->unsignedInteger('entity_id')->nullable();
            $table->unsignedInteger('entity_type_id')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('comments');
    }
}
