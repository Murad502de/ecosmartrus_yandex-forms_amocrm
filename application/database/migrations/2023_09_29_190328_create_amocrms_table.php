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
        Schema::create('amocrms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->uuid('uuid')->index();
            $table->string('client_id');
            $table->string('client_secret');
            $table->string('subdomain');
            $table->text('access_token');
            $table->string('redirect_uri');
            $table->string('token_type');
            $table->text('refresh_token');
            $table->unsignedBigInteger('when_expires');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amocrms');
    }
};
