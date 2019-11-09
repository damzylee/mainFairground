<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('number')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('type');
            $table->string('country');
            $table->string('state');
            $table->string('address');
            $table->string('image')->nullable();
            $table->string('profile')->nullable();
            $table->boolean('confirm')->nullable();
            $table->date('YOE')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
