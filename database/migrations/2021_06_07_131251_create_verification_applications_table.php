<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerificationApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verification_applications', function (Blueprint $table) {
            $table->id();

            $table->string("title")->default('');
            $table->string("document_number")->default('');

            $table->integer("type")->default(0);

            $table->json('documents');
            $table->json('images');

            $table->longText('comment');
            $table->boolean('is_approved')->default(false)->comment("статус верификации");
            $table->json('additional_properties');
            $table->unsignedInteger("profile_id")->nullable();

            $table->timestamp("issue_date")->nullable();
            $table->timestamp("expire_date")->nullable();

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
        Schema::dropIfExists('verification_applications');
    }
}
