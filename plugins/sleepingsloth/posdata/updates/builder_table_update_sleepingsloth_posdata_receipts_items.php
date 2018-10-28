<?php namespace Sleepingsloth\Posdata\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSleepingslothPosdataReceiptsItems extends Migration
{
    public function up()
    {
        Schema::table('sleepingsloth_posdata_receipts_items', function($table)
        {
            $table->string('price', 10)->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('sleepingsloth_posdata_receipts_items', function($table)
        {
            $table->integer('price')->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
}
