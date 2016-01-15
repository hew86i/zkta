<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pin');
            $table->string('name')->nullable();
            $table->string('password')->nullable();;
            $table->integer('group')->default(1);
            $table->integer('privilege')->default(0); //privilege (0: regular user, 2: enroller, 6: admin and 14: superadmin)
            $table->string('card_number')->nullable();;
            $table->string('pin2')->default(0);
            $table->string('tz1')->default(0);
            $table->string('tz2')->default(0);
            $table->string('tz3')->default(0);

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
        Schema::drop('employees');
    }
}
