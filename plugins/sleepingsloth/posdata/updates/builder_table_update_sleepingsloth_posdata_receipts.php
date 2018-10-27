<?php namespace Sleepingsloth\Posdata\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSleepingslothPosdataReceipts extends Migration
{
    public function up()
    {
        Schema::table('sleepingsloth_posdata_receipts', function($table)
        {
            $table->increments('id')->unsigned(false)->change();
            $table->string('vendor_name')->change();
            $table->string('vendor_category')->change();
            $table->string('location')->change();
            $table->string('total')->change();
            $table->dropColumn('vat');
        });
    }
    
    public function down()
    {
        Schema::table('sleepingsloth_posdata_receipts', function($table)
        {
            $table->increments('id')->unsigned()->change();
            $table->string('vendor_name', 191)->change();
            $table->string('vendor_category', 191)->change();
            $table->string('location', 191)->change();
            $table->string('total', 191)->change();
            $table->string('vat', 191);
        });
    }
}
