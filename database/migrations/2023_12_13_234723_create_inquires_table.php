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
        Schema::create('inquires', function (Blueprint $table) {
            $table->id();
            $table->string('fullName')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('contactNo')->nullable();
            $table->string('companyRegistration')->nullable();
            $table->string('message')->nullable();
            $table->string('inquireDocs')->nullable();
            $table->string('national_id')->nullable();
            $table->string('company_registration')->nullable();
            $table->string('otherDocs')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquires');
    }
};
