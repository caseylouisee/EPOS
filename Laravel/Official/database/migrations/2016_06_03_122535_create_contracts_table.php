<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('equipment_id')->unsigned();
            $table->foreign('equipment_id')->references('id')->on('equipment')->onDelete('cascade');
            $table->string('start');
            $table->string('length');
            $table->string('value');
            $table->string('type'); //warranty/contract
            $table->string('paid');
            $table->string('discount');
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
        Schema::dropIfExists('contracts');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
