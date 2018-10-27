<?php namespace Sleepingsloth\Posdata\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSleepingslothPosdataReceiptsItems extends Migration
{
    public function up()
    {
        Schema::create('sleepingsloth_posdata_receipts_items', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('receipts_id');
            $table->string('item_name');
            $table->integer('quantity');
            $table->integer('price');
            $table->string('category');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('sleepingsloth_posdata_receipts_items');
    }
}
