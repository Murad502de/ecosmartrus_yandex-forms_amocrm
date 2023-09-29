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
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->uuid('uuid')->index();

            $table->string('amocrm_subdomain');
            $table->string('amocrm_redirect_uri');
            $table->string('amocrm_client_secret');

            $table->unsignedInteger('amocrm_communication_methods_id');
            $table->unsignedInteger('amocrm_social_links_id');
            $table->unsignedInteger('amocrm_additional_Info_id');
            $table->unsignedInteger('amocrm_pregnancy_id');
            $table->unsignedInteger('amocrm_human_parameters_id');
            $table->unsignedInteger('amocrm_health_id');
            $table->unsignedInteger('amocrm_family_status_id');
            $table->unsignedInteger('amocrm_contact_person_id');
            $table->unsignedInteger('amocrm_language_knowledge_id');
            $table->unsignedInteger('amocrm_driver_license_id');
            $table->unsignedInteger('amocrm_education_id');
            $table->unsignedInteger('amocrm_visa_violations_id');
            $table->unsignedInteger('amocrm_criminal_record_id');
            $table->unsignedInteger('amocrm_previous_work_visas_id');
            $table->unsignedInteger('amocrm_outside_recommendation_id');
            $table->unsignedInteger('amocrm_experience_id');
            $table->unsignedInteger('amocrm_last_3_jobs_id');
            $table->unsignedInteger('amocrm_current_work_place_id');
            $table->unsignedInteger('amocrm_residence_permit_id');
            $table->unsignedInteger('amocrm_passport_id');
            $table->unsignedInteger('amocrm_residence_id');
            $table->unsignedInteger('amocrm_citizenship_id');
            $table->unsignedInteger('amocrm_phone_id');
            $table->unsignedInteger('amocrm_full_name_id');
            $table->unsignedInteger('amocrm_position_id');
            $table->unsignedInteger('amocrm_email_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configurations');
    }
};
