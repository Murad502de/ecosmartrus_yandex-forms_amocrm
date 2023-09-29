<?php

namespace App\Models;

use App\Traits\GenerateUuidModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amocrm extends Model
{
    use HasFactory, GenerateUuidModelTrait;

    protected $fillable = [
        'uuid',
        'client_id',
        'client_secret',
        'subdomain',
        'access_token',
        'redirect_uri',
        'token_type',
        'refresh_token',
        'when_expires',
    ];
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    /**
     * @param array $accountData = [
     *  @param string client_id
     *  @param string client_secret
     *  @param string subdomain
     *  @param string access_token
     *  @param string redirect_uri
     *  @param string token_type
     *  @param string refresh_token
     *  @param int when_expires
     * ]
     */
    public static function signin(array $accountData): void
    {
        self::truncate();
        self::create($accountData);
    }
    public static function signout(): void
    {
        self::truncate();
    }
    public static function getAuthData()
    {
        $authData = self::first();

        if (!$authData) {
            return false;
        }

        return [
            'client_id'     => $authData->client_id,
            'client_secret' => $authData->client_secret,
            'subdomain'     => $authData->subdomain,
            'access_token'  => $authData->access_token,
            'redirect_uri'  => $authData->redirect_uri,
            'token_type'    => $authData->token_type,
            'refresh_token' => $authData->refresh_token,
            'when_expires'  => $authData->when_expires,
        ];
    }
}
