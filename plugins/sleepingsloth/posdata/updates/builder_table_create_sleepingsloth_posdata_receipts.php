<?php namespace Sleepingsloth\Posdata\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSleepingslothPosdataReceipts extends Migration
{
    public function up()
    {
        Schema::create('sleepingsloth_posdata_receipts', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('customer_id');
            $table->string('vendor_name');
            $table->string('vendor_category');
            $table->string('location');
            $table->date('date');
            $table->string('vat');
            $table->string('total');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('sleepingsloth_posdata_receipts');
    }
}
