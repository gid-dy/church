<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildrensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('childrens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBiginteger('service_id');
            $table->unsignedBiginteger('title_id');
            $table->unsignedBiginteger('Organisation_id');
            $table->string('role');
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
            $table->string('mothers_name')->nullable();
            $table->string('mothers_contact')->nullable();
            $table->string('mothers_occupation')->nullable();
            $table->string('fathers_name')->nullable();
            $table->string('fathers_contact')->nullable();
            $table->string('fathers_occupation')->nullable();
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
        Schema::dropIfExists('childrens');
    }
}
