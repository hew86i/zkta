<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('device_name');
            $table->integer('internal_id')->default(1);
            $table->string('ip_address')->default('169.254.0.1');
            $table->integer('com_key')->default(0);
            $table->string('description');
            $table->integer('soap_port')->default(80);
            $table->integer('udp_port')->default(4370);
            $table->string('encoding')->default('utf-8');
            $table->integer('connection_timeout')->default(2);
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
        Schema::drop('devices');
    }
}
