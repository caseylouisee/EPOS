<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManufacturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manufacturers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('manufacturer_name');
            $table->string('contact_name');
            $table->string('account_no');

            $table->string('address_1');
            $table->string('address_2');
            $table->string('town');
            $table->string('county');
            $table->string('postcode', 9);
            
            $table->string('primary_telephone');
            $table->string('alternate_telephone');
            $table->string('fax');
            $table->string('email');
            $table->string('website');
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
        Schema::dropIfExists('manufacturers');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
