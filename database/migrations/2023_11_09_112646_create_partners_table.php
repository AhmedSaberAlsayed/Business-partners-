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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('img_path');
            $table->string('describtion');
            $table->string('visit_our_website');
            $table->string('view_company_profile');
            $table->string('facebook_link');
            $table->string('whatsApp_link');
            $table->string('viber_link');
            $table->string('instagram_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
