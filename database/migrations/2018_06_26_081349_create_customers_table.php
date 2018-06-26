<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('nickname')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->date('dob')->nullable();
            $table->enum('gender', ['Female', 'Male']);
            $table->integer('type_id')->unsigned();
            $table->timestamps();            
            $table->foreign('type_id')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
