<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\ConfigurationCreateRequset__1;
use App\Http\Requests\API\V1\ConfigurationUpdateRequset__1;
use App\Http\Resources\API\V1\ConfigurationReadResource__1;
use App\Models\Configuration;
use Illuminate\Http\Response;

class ConfigurationController__1 extends Controller
{
    public function create(ConfigurationCreateRequset__1 $request)
    {
        Configuration::truncate();
        $configuration = Configuration::create($request->all());
        return $configuration
        ? response()->json(['message' => 'success'], Response::HTTP_OK)
        : response()->json(['message' => 'error'], Response::HTTP_BAD_REQUEST);
    }
    public function read()
    {
        return new ConfigurationReadResource__1(Configuration::first() ?? Configuration::create([
            'amocrm_subdomain'                 => '',
            'amocrm_redirect_uri'              => '',
            'amocrm_client_secret'             => '',
            'amocrm_communication_methods_id'  => 0,
            'amocrm_social_links_id'           => 0,
            'amocrm_additional_info_id'        => 0,
            'amocrm_pregnancy_id'              => 0,
            'amocrm_human_parameters_id'       => 0,
            'amocrm_health_id'                 => 0,
            'amocrm_family_status_id'          => 0,
            'amocrm_contact_person_id'         => 0,
            'amocrm_language_knowledge_id'     => 0,
            'amocrm_driver_license_id'         => 0,
            'amocrm_education_id'              => 0,
            'amocrm_visa_violations_id'        => 0,
            'amocrm_criminal_record_id'        => 0,
            'amocrm_previous_work_visas_id'    => 0,
            'amocrm_outside_recommendation_id' => 0,
            'amocrm_experience_id'             => 0,
            'amocrm_last_3_jobs_id'            => 0,
            'amocrm_current_work_place_id'     => 0,
            'amocrm_residence_permit_id'       => 0,
            'amocrm_passport_id'               => 0,
            'amocrm_residence_id'              => 0,
            'amocrm_citizenship_id'            => 0,
            'amocrm_phone_id'                  => 0,
            'amocrm_full_name_id'              => 0,
            'amocrm_position_id'               => 0,
            'amocrm_email_id'                  => 0,
        ]));
    }
    public function update(ConfigurationUpdateRequset__1 $request)
    {
        $configuration = Configuration::first();

        if ($configuration) {
            $configuration->update($request->all());
            return response()->json(['message' => 'success'], Response::HTTP_OK);
        }

        return response()->json(['message' => 'configuration not found'], Response::HTTP_NOT_FOUND);
    }
    public function delete()
    {
        Configuration::truncate();
        return response()->json(['message' => 'success'], Response::HTTP_OK);
    }
}
