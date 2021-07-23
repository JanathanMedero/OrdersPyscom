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

            $table->boolean('complete_maintenance');
            $table->boolean('preventive_maintenance');
            $table->boolean('bios');
            $table->boolean('virus');
            $table->boolean('software_reinstallation');
            $table->boolean('special_software');
            $table->boolean('clean');
            $table->boolean('printer_cleaning');
            $table->boolean('head_maintenance');
            $table->boolean('hardware');
            $table->string('technical_report');
            $table->string('special_remarks');
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
