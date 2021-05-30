<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('company_name');
            $table->string('first_name');
            $table->string('name');
            $table->string('telephone_number');
            $table->string('mobile_number')->unique();
            $table->string('country');
            $table->string('city');
            $table->string('region');
            $table->string('areas_of_expertise');
            $table->string("role_id");
            $table->foreign('role_id')->references('id')->on('roles');
            $table->softDeletes();
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
        Schema::dropIfExists('profiles');
    }
}
