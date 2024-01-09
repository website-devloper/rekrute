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
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('password');
            $table->string('Established_In')->nullable();
            $table->string('type')->nullable();
            $table->string('logo_url')->nullable();
            $table->string('website_url')->nullable();
            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->integer('zip_code')->nullable();
            $table->string('country')->nullable();
            $table->integer('phone')->nullable();
            $table->string('email_adress');
            $table->string('company_bg')->nullable();
            $table->string('service')->nullable();
            $table->string('Expertise')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employers');
    }
};
