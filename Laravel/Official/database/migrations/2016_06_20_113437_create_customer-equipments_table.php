<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_equipments', function (Blueprint $table) {
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            
            $table->integer('equipment_id')->unsigned();
            $table->foreign('equipment_id')->references('id')->on('equipment')->onDelete('cascade');
            
            $table->string('install_date')->date();
            $table->string('internal_warranty_period');
            $table->string('payment_method');
            $table->string('lease_term');
            $table->longText('notes');
            
            $table->primary('equipment_id');	

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
        Schema::dropIfExists('customer_equipments');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1'); 
    }
}
