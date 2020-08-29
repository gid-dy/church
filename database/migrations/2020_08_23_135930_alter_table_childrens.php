<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableChildrens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('childrens', function (Blueprint $table) {
            $table->bigInteger('service_id')->nullable()->unsigned()->after('id');
            $table->foreign('service_id')->references('id')->on('services');

            $table->bigInteger('title_id')->nullable()->unsigned()->after('service_id');
            $table->foreign('title_id')->references('id')->on('titles');

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
        Schema::table('childrens', function (Blueprint $table) {
            //
        });
    }
}
