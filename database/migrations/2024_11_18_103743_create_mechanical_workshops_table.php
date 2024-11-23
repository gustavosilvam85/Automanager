<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mechanical_workshops', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('cnpj')->unique();
            $table->string('corporate_name');
            $table->string('owner');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip_code');
            $table->string('phone1');
            $table->string('phone2')->nullable();
            $table->string('email');
            $table->string('password');
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('mechanical_workshop');
    }
};
