<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->increments('id_company');
            $table->string('name_company');
            $table->string('document_company');
            $table->string('zipcode_company');
            $table->string('address_company');
            $table->string('city_company');
            $table->string('tel_company');
            $table->string('state_company');
            $table->string('profile_img_company');
            $table->string('imgs_company', 555);
            $table->unsignedBigInteger('fk_id_user');
            $table->foreign('fk_id_user')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_profiles');
    }
};
