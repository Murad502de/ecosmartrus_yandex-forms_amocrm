<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicesYandexFormsController__1 extends Controller
{
    public function submit(Request $request)
    {
        return $request->all()['params'];
    }
}
