<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('equipment_id')->nullable();
            $table->foreign('equipment_id')->references('id')->on('equipments')->onDelete('cascade');

            $table->boolean('complete_maintenance')->nullable();
            $table->boolean('preventive_maintenance')->nullable();
            $table->boolean('bios')->nullable();
            $table->boolean('virus')->nullable();
            $table->boolean('software_reinstallation')->nullable();
            $table->boolean('special_software')->nullable();
            $table->boolean('clean')->nullable();
            $table->boolean('printer_cleaning')->nullable();
            $table->boolean('head_maintenance')->nullable();
            $table->boolean('hardware')->nullable();
            $table->string('technical_report');
            $table->string('special_remarks')->nullable();
            $table->string('technical_name');
            $table->integer('price');
            $table->integer('delivery_date');

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
        Schema::dropIfExists('services');
    }
}
