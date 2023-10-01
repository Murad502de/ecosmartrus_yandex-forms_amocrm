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
        Schema::table('configurations', function (Blueprint $table) {
            $table->unsignedInteger('amocrm_default_resp_user_id');
            $table->unsignedInteger('amocrm_form_sent_id');
            $table->unsignedInteger('amocrm_form_completed_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('configurations', function (Blueprint $table) {
            $table->dropColumn('amocrm_default_resp_user_id');
            $table->dropColumn('amocrm_form_sent_id');
            $table->dropColumn('amocrm_form_completed_id');
        });
    }
};
