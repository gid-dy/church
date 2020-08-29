<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adults', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBiginteger('title_id');
            $table->unsignedBiginteger('service_id');
            $table->unsignedBiginteger('classleader_id');
            $table->unsignedBiginteger('Organisation_id');
            $table->unsignedBiginteger('children_id')->nullable();
            $table->string('surname');
            $table->string('othernames');
            $table->string('gender');
            $table->string('contact_1')->unique('contact_1');
            $table->string('contact_2')->nullable();
            $table->string('baptism_status');
            $table->string('married_status');
            $table->string('occupation')->nullable();
            $table->string('resident');
            $table->string('hometown')->nullable();
            $table->string('region');
            $table->date('dob');
            $table->string('age');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adults');
    }
}
