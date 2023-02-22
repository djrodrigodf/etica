<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Construction extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'constructions';

    public const SITUATION_SELECT = [
        'Em andamento' => 'Em andamento',
    ];

    public const PUBLIC_AGENCY_SELECT = [
        'Goinfra - GO' => 'Goinfra - GO',
    ];

    public const TYPE_SELECT = [
        'tipo 1' => 'tipo 1',
        'tipo 2' => 'tipo 2',
    ];

    protected $dates = [
        'budget_base_date',
        'proposal_base_date',
        'use_base_date',
        'contract_publication_date',
        'start_order_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'project_mega',
        'name',
        'public_agency',
        'situation',
        'work_group',
        'copartner',
        'iss',
        'tax',
        'partner_percentage',
        'role',
        'administration_fee',
        'reserve_fund',
        'public_notice_number',
        'average_discount',
        'budget_base_date',
        'proposal_base_date',
        'use_base_date',
        'contract_value',
        'type',
        'contract_number',
        'contract_publication_date',
        'deadline_contract',
        'start_order_date',
        'cei_registration',
        'cnpj_branch',
        'policy_value',
        'construction_site_city',
        'site_address',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function constructionHirings()
    {
        return $this->hasMany(Hiring::class, 'construction_id', 'id');
    }

    public function constructionThirdPartyRegistrations()
    {
        return $this->hasMany(ThirdPartyRegistration::class, 'construction_id', 'id');
    }

    public function teams()
    {
        return $this->belongsToMany(BusinessPartner::class);
    }

    public function getBudgetBaseDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBudgetBaseDateAttribute($value)
    {
        $this->attributes['budget_base_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getProposalBaseDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setProposalBaseDateAttribute($value)
    {
        $this->attributes['proposal_base_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getUseBaseDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setUseBaseDateAttribute($value)
    {
        $this->attributes['use_base_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getContractPublicationDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setContractPublicationDateAttribute($value)
    {
        $this->attributes['contract_publication_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getStartOrderDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStartOrderDateAttribute($value)
    {
        $this->attributes['start_order_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
