<?php

namespace App\Models;

use App\Traits\GenerateUuidModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory, GenerateUuidModelTrait;

    protected $fillable = [
        'uuid',
        'amocrm_subdomain',
        'amocrm_redirect_uri',
        'amocrm_client_secret',
        'amocrm_communication_methods_id',
        'amocrm_social_links_id',
        'amocrm_additional_Info_id',
        'amocrm_pregnancy_id',
        'amocrm_human_parameters_id',
        'amocrm_health_id',
        'amocrm_family_status_id',
        'amocrm_contact_person_id',
        'amocrm_language_knowledge_id',
        'amocrm_driver_license_id',
        'amocrm_education_id',
        'amocrm_visa_violations_id',
        'amocrm_criminal_record_id',
        'amocrm_previous_work_visas_id',
        'amocrm_outside_recommendation_id',
        'amocrm_experience_id',
        'amocrm_last_3_jobs_id',
        'amocrm_current_work_place_id',
        'amocrm_residence_permit_id',
        'amocrm_passport_id',
        'amocrm_residence_id',
        'amocrm_citizenship_id',
        'amocrm_phone_id',
        'amocrm_full_name_id',
        'amocrm_position_id',
        'amocrm_email_id',
    ];
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];
}
