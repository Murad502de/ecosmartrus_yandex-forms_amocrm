<?php

namespace App\Models;

use App\Traits\GenerateUuidModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Configuration extends Model
{
    use HasFactory, GenerateUuidModelTrait;

    protected $fillable = [
        'uuid',
        'amocrm_subdomain',
        'amocrm_redirect_uri',
        'amocrm_client_secret',
        'amocrm_utm_source_id',
        'amocrm_utm_product_price_id',
        'min_payout',
        'personal_link_host',
        'percentage',
    ];
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    /* RELATIONS */
    public function configurationPercentageLevels(): HasMany
    {
        return $this->hasMany(ConfigurationPercentageLevel::class);
    }
}
