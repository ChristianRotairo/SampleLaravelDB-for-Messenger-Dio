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
        Schema::create('data_entry', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('kvnr');
            $table->string('birthDay');
            $table->string('gender');
            $table->string('placeOfBirth');
            $table->string('maritalStatus');
            $table->string('birthState');
            $table->string('religion');
            $table->string('motherMaidenName');
            $table->string('children');
            $table->string('motherDeceasedDate');
            $table->string('motherCausedOfDeath');
            $table->string('fatherName');
            $table->string('fatherDeceasedDate');
            $table->string('fatherCausedOfDeath');
            $table->string('spouseName');
            $table->string('spouseDeceasedDate');
            $table->string('spouseCausedOfDeath');
            $table->string('preferredLanguage');
            $table->string('contactPreference');
            $table->string('emailAddress');
            $table->string('emergencyContactName');
            $table->string('relationship');
            $table->string('phoneNumber');
            $table->string('emergencyContactEmailAddress');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_entry');
    }
};
