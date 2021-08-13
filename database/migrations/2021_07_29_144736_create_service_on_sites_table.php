<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceOnSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_on_sites', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('order_service_id')->nullable();
            $table->foreign('order_service_id')->references('id')->on('order_service_on_sites')->onDelete('cascade');

            $table->string('name');
            $table->string('slug');
            $table->integer('quantity');
            $table->integer('net_price');
            $table->text('description')->nullable();

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
        Schema::dropIfExists('service_on_sites');
    }
}
