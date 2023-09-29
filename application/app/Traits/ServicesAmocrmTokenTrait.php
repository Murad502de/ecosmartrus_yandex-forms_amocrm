<?php

namespace App\Traits;

use App\Models\Amocrm;
use App\Services\amoAPI\amoHttp\amoClient;
// use Illuminate\Support\Facades\Log;

trait ServicesAmocrmTokenTrait
{
    public static function checkAmocrmToken(): bool
    {
        // Log::info(__METHOD__); //DELETE

        $client   = new amoClient();
        $authData = Amocrm::getAuthData();

        if ($authData) {
            // Log::info(__METHOD__, $authData); //DELETE

            if (time() >= (int) $authData['when_expires']) {
                // Log::info(__METHOD__, ['amocrm access token expired']); //DELETE

                $response = $client->accessTokenUpdate($authData);

                if ($response['code'] >= 200 && $response['code'] < 204) {
                    $accountData = [
                        'client_id'     => $authData['client_id'],
                        'client_secret' => $authData['client_secret'],
                        'subdomain'     => $authData['subdomain'],
                        'access_token'  => $response['body']['access_token'],
                        'redirect_uri'  => $authData['redirect_uri'],
                        'token_type'    => $response['body']['token_type'],
                        'refresh_token' => $response['body']['refresh_token'],
                        'when_expires'  => time() + (int) $response['body']['expires_in'] - 400,
                    ];

                    Amocrm::signin($accountData);

                    // Log::info(__METHOD__, ['amocrm access token updated']); //DELETE

                    return true;
                }

                // Log::error(__METHOD__, ['amocrm auth error with code: ' . $response['code']]); //DELETE

                return false;
            }

            // Log::info(__METHOD__, ['amocrm access token ist not expired']); //DELETE

            return true;
        }

        // Log::error(__METHOD__, ['amocrm auth data not found']); //DELETE

        return false;
    }
}
