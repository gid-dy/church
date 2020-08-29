<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableAdultss extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('adults', function (Blueprint $table) {
            $table->bigInteger('childrenclass_id')->nullable()->unsigned()->after('title_id');
            $table->foreign('childrenclass_id')->references('id')->on('childrenclasses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('adults', function (Blueprint $table) {
            //
        });
    }
}
