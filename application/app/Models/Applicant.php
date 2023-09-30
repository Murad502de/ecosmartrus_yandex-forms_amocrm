<?php

namespace App\Models;

use App\Traits\GenerateUuidModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Applicant extends Model
{
    use HasFactory, GenerateUuidModelTrait;

    protected $fillable = [
        'uuid',
        'amo_id',
        'name',
        'email',
        'phone',
    ];
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function deals(): HasMany
    {
        return $this->hasMany(Deal::class);
    }
}
