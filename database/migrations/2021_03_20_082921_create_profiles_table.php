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
            $table->string('type')->default('');
            $table->string('image', 1000)->default('');
            $table->string('company_name')->default('');
            $table->string('first_name')->default('');
            $table->string('second_name')->default('');
            $table->string('telephone_number_1')->default('');
            $table->string('telephone_number_2')->default('');
            $table->string('country')->default('');
            $table->string('city')->default('');
            $table->string('region')->default('');
            $table->string('postal')->default('');
            $table->string('areas_of_expertise')->default('');
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
