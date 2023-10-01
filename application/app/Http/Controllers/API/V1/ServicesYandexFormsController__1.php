<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Amocrm;
use App\Models\Applicant;
use App\Services\amoAPI\amoAPIHub;
use Illuminate\Http\Request;

class ServicesYandexFormsController__1 extends Controller
{
    public function submit(Request $request)
    {
        $PARAMS = $request->all()['params'];

        //TODO search contact by email
        $AMO_API   = new amoAPIHub(Amocrm::getAuthData());
        $applicant = Applicant::updateOrCreate(
            ['email' => $PARAMS['email']],
            [
                'phone' => $PARAMS['phone'],
            ]
        );

        dump($applicant); //DELETE
        dump($applicant->amo_id); //DELETE

        if (!$applicant->amo_id) {
            //TODO find contact in amo by email
            $amoContact = $AMO_API->findContactByQuery($PARAMS['email']);
            dump($amoContact); //DELETE

            //TODO if not found, then create contact
            // $amoContactId = $AMO_API->createContact([
            //     'name'                 => 'test api contact',
            //     'custom_fields_values' => [
            //         [
            //             'field_id' => 2442447,
            //             'values'   => [
            //                 [
            //                     'value'     => '79999999999',
            //                     'enum_code' => 'WORK',
            //                 ],
            //             ],
            //         ],
            //         [
            //             'field_id' => 2442449,
            //             'values'   => [
            //                 [
            //                     'value'     => 'test@gmail.com',
            //                     'enum_code' => 'WORK',
            //                 ],
            //             ],
            //         ],
            //     ],
            // ]);

            // dump($amoContactId); //DELETE

            // //TODO save amo_id of contact to db
            // $applicant->amo_id = $amoContactId;
            // $applicant->save();
        }

        //TODO create lead
        //TODO attach lead to contact
    }
}
