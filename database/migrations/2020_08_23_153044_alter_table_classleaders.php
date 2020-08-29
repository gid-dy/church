<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableClassleaders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('classleaders', function (Blueprint $table) {
            $table->bigInteger('bibleclass_id')->nullable()->unsigned()->after('id');
            $table->foreign('bibleclass_id')->references('id')->on('bibleclasses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classleaders', function (Blueprint $table) {
            //
        });
    }
}
