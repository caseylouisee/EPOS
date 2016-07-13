<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('make'); //dropdown
            $table->string('model'); //dropdown
            $table->longText('description');
            $table->integer('manufacturer_id')->unsigned();
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers')->onDelete('cascade');
            $table->string('serial_no');
            $table->string('type'); //service/equipment
            $table->string('license_no');
            $table->string('manufacturer_warranty_period');
            
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->string('install_date');
            $table->string('internal_warranty_period');
            $table->string('purchase_value');
            $table->string('payment_method');
            $table->longText('notes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('equipment');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');    
    }
}
