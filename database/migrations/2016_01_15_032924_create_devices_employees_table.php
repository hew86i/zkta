<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDevicesEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices_employees', function (Blueprint $table) {
            $table->integer('device_id')->unsigned();
            $table->integer('emp_id')->unsigned();
            $table->primary(['device_id', 'emp_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('devices_employees');
    }
}
