<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessPartner extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'business_partners';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'company_name',
        'cnpj_cpf',
        'ie',
        'phone',
        'email',
        'zip_code',
        'address',
        'number',
        'complement',
        'district',
        'city',
        'state',
        'country',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function partnerAdmissions()
    {
        return $this->hasMany(Admission::class, 'partner_id', 'id');
    }

    public function partnerHirings()
    {
        return $this->hasMany(Hiring::class, 'partner_id', 'id');
    }

    public function partnerThirdPartyRegistrations()
    {
        return $this->hasMany(ThirdPartyRegistration::class, 'partner_id', 'id');
    }

    public function teamConstructions()
    {
        return $this->belongsToMany(Construction::class);
    }
}
