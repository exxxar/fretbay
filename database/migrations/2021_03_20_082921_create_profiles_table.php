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

            $table->json("transport_specialities")->nullable();
            $table->integer("number_of_drivers")->default(0);
            $table->integer("cargo_insurance_amount")->default(0);
            $table->longText("about_company")->nullable();
            $table->longText("additional_service")->nullable();
            $table->string("insurance_company")->default('');
            $table->boolean('is_approved')->default(false);
            $table->boolean('is_first_activation')->default(true);
            $table->json("payment_methods")->nullable();
            $table->json("spoken_languages")->nullable();

            $table->boolean( "email_notify")->default(true);
            $table->boolean( "newsletter_notify")->default(true);
            $table->boolean( "push_notify")->default(true);

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
