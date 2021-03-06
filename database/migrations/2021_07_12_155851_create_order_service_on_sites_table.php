<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderServiceOnSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_service_on_sites', function (Blueprint $table) {
            $table->id()->startingValue(9000);

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

            $table->unsignedBigInteger('office_id');
            $table->foreign('office_id')->references('id')->on('offices');

            $table->date('date_of_service');
            $table->string('folio');
            $table->text('observations')->nullable();
            $table->string('advance')->nullable();

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
        Schema::dropIfExists('order_service_on_sites');
    }
}
