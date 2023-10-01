<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Amocrm;
use App\Models\Applicant;
use App\Models\Configuration;
use App\Services\amoAPI\amoAPIHub;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ServicesYandexFormsController__1 extends Controller
{
    //FIXME This is a very bad, but quick way to implement it. There was no time. It will be redone in the future.
    public function submit(Request $request)
    {
        $configuration = Configuration::first();

        if ($configuration) {
            $PARAMS = $request->all()['params'];

            $AMO_API = new amoAPIHub(Amocrm::getAuthData());

            if (!Applicant::whereEmail($PARAMS['email'])->exists()) {
                dump('dont exists in DB'); //DELETE
                $applicant = Applicant::create([
                    'email' => $PARAMS['email'],
                    'phone' => $PARAMS['phone'],
                    'name'  => $PARAMS['full_name'],
                ]);

                $findContactByQueryResponse = $AMO_API->findContactByQuery($applicant->email);

                // dump($findContactByQueryResponse); //DELETE

                $amoContactId = null;

                if ($findContactByQueryResponse['code'] === 200) {
                    dump('update contact'); //DELETE
                    $amoContactId = (int) $findContactByQueryResponse['body']['_embedded']['contacts'][0]['id'];
                    dump($amoContactId); //DELETE
                    $AMO_API->updateContact([[
                        'id'                   => (int) $amoContactId,
                        'custom_fields_values' => [
                            [
                                'field_id' => $configuration->amocrm_phone_id,
                                'values'   => [
                                    [
                                        'value'     => $applicant->phone,
                                        'enum_code' => 'WORK',
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_email_id,
                                'values'   => [
                                    [
                                        'value'     => $applicant->email,
                                        'enum_code' => 'WORK',
                                    ],
                                ],
                            ],

                            [
                                'field_id' => $configuration->amocrm_position_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['position'],
                                    ],
                                ],
                            ],

                            // [
                            //     'field_id' => $configuration->amocrm_full_name_id,
                            //     'values'   => [
                            //         [
                            //             'value' => $PARAMS['full_name'],
                            //         ],
                            //     ],
                            // ],

                            [
                                'field_id' => $configuration->amocrm_citizenship_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['citizenship'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_residence_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['residence'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_passport_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['passport'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_residence_permit_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['residence_permit'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_current_work_place_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['current_work_place'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_last_3_jobs_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['last_3_jobs'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_experience_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['experience'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_outside_recommendation_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['outside_recommendation'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_previous_work_visas_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['previous_work_visas'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_criminal_record_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['criminal_record'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_visa_violations_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['visa_violations'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_education_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['education'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_driver_license_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['driver_license'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_language_knowledge_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['language_knowledge'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_contact_person_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['contact_person'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_family_status_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['family_status'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_health_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['health'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_human_parameters_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['human_parameters'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_pregnancy_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['pregnancy'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_additional_info_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['additional_info'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_social_links_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['social_links'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_communication_methods_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['communication_methods'],
                                    ],
                                ],
                            ],
                        ],
                    ]]);
                } else {
                    dump('create contact'); //DELETE
                    $amoContactId = $AMO_API->createContact([
                        'name'                 => $applicant->name,
                        'custom_fields_values' => [
                            [
                                'field_id' => $configuration->amocrm_phone_id,
                                'values'   => [
                                    [
                                        'value'     => $applicant->phone,
                                        'enum_code' => 'WORK',
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_email_id,
                                'values'   => [
                                    [
                                        'value'     => $applicant->email,
                                        'enum_code' => 'WORK',
                                    ],
                                ],
                            ],

                            [
                                'field_id' => $configuration->amocrm_position_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['position'],
                                    ],
                                ],
                            ],
                            // [
                            //     'field_id' => $configuration->amocrm_full_name_id,
                            //     'values'   => [
                            //         [
                            //             'value' => $PARAMS['full_name'],
                            //         ],
                            //     ],
                            // ],

                            [
                                'field_id' => $configuration->amocrm_citizenship_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['citizenship'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_residence_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['residence'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_passport_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['passport'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_residence_permit_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['residence_permit'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_current_work_place_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['current_work_place'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_last_3_jobs_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['last_3_jobs'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_experience_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['experience'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_outside_recommendation_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['outside_recommendation'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_previous_work_visas_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['previous_work_visas'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_criminal_record_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['criminal_record'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_visa_violations_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['visa_violations'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_education_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['education'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_driver_license_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['driver_license'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_language_knowledge_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['language_knowledge'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_contact_person_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['contact_person'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_family_status_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['family_status'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_health_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['health'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_human_parameters_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['human_parameters'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_pregnancy_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['pregnancy'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_additional_info_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['additional_info'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_social_links_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['social_links'],
                                    ],
                                ],
                            ],
                            [
                                'field_id' => $configuration->amocrm_communication_methods_id,
                                'values'   => [
                                    [
                                        'value' => $PARAMS['communication_methods'],
                                    ],
                                ],
                            ],
                        ],
                    ]);
                }

                dump($amoContactId); //DELETE

                if ($amoContactId) {
                    dump('target'); //DELETE

                    //TODO save amo_id of contact to db
                    $amoContactId      = (int) $amoContactId;
                    $applicant->amo_id = $amoContactId;
                    $applicant->save();

                    $findContactByIdResponse = $AMO_API->findContactById($applicant->amo_id);
                    $amoLeads                = $findContactByIdResponse['body']['_embedded']['leads'];

                    dump('AMO_LEADS'); //DELETE
                    // dump($amoLeads); //DELETE

                    $targetAmoLead = null;

                    foreach ($amoLeads as $amoLead) {
                        $findLeadByIdResponse = $AMO_API->findLeadById($amoLead['id']);
                        // dump($findLeadByIdResponse['body']['status_id']); //DELETE

                        if ($findLeadByIdResponse['code'] === 200) {
                            $amoLeadDetail = $findLeadByIdResponse['body'];

                            if ((int) $amoLeadDetail['status_id'] === $configuration->amocrm_form_sent_id) {
                                dump('target lead'); //DELETE
                                $targetAmoLead = $amoLeadDetail;
                            }
                        }
                    }

                    if ($targetAmoLead) {
                        dump('update lead'); //DELETE
                        $updateLeadResponse = $AMO_API->updateLead([[
                            'id'        => $targetAmoLead['id'],
                            'status_id' => $configuration->amocrm_form_completed_id, // zapolnena
                        ]]);
                        // dump($updateLeadResponse); //DELETE
                    } else {
                        dump('create lead'); //DELETE
                        //TODO create lead
                        $createLeadResponse = $AMO_API->createLead([
                            'name'                => $PARAMS['position'],
                            'responsible_user_id' => $configuration->amocrm_default_resp_user_id, // Irina
                            'status_id' => $configuration->amocrm_form_completed_id, // zapolnena
                        ]);

                        dump($createLeadResponse); //DELETE

                        if ($createLeadResponse) {
                            $linkContactsToLeadResponse = $AMO_API->linkContactsToLead($createLeadResponse, [[
                                'to_entity_id'   => $applicant->amo_id,
                                'to_entity_type' => "contacts",
                            ]]);
                        }
                    }

                    //TODO attach lead to contact
                } else {
                    // $applicant->delete();
                }
            } else {
                // dump('exists in DB'); //DELETE
            }
        }

        return response()->json(['message' => 'success'], Response::HTTP_OK);
    }
}
