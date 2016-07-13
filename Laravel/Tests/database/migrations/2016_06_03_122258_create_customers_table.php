<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->string('contact_name');
            
            $table->string('address_1');
            $table->string('address_2');
            $table->string('address_3');
            $table->string('town');
            $table->string('county');
            $table->string('postcode', 9);
            
            $table->string('primary_telephone');
            $table->string('alternate_telephone');
            $table->string('mobile');
            $table->string('fax');
            $table->string('email');
            
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
        Schema::dropIfExists('customers');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
