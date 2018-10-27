<?php namespace Sleepingsloth\Posdata\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSleepingslothPosdata extends Migration
{
    public function up()
    {
        Schema::create('sleepingsloth_posdata_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('price');
            $table->string('vat');
            $table->string('item_category');
            $table->string('retailer_category');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('sleepingsloth_posdata_');
    }
}
