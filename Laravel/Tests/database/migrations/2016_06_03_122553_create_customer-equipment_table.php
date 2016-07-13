<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('customer_equipment', function(Blueprint $table)
//        {
//            $table->integer('customer_id')->unsigned();
//            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
//            $table->integer('equipment_id')->unsigned();
//            $table->foreign('equipment_id')->references('id')->on('equipment')->onDelete('cascade');
//            $table->primary(array('customer_id', 'equipment_id'));	
//            $table->string('install_date');
//            $table->string('internal_warranty_period');
//            $table->string('purchase_value');
//            $table->string('payment_method');
//            $table->longText('notes');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
//        Schema::dropIfExists('customer_equipment');
//        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
