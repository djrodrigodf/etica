<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ThirdPartyRegistration extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const EPI_SELECT = [
        'Não possui'        => 'Não possui',
        'Sim, com desconto' => 'Sim, com desconto',
        'Sim, sem desconto' => 'Sim, sem desconto',
    ];

    public const FOOD_SELECT = [
        'Não Possui'        => 'Não Possui',
        'Sim, com desconto' => 'Sim, com desconto',
        'Sim, sem desconto' => 'Sim, sem desconto',
    ];

    public const TRANSPORT_SELECT = [
        'Não possui'        => 'Não possui',
        'Sim, com desconto' => 'Sim, com desconto',
        'Sim, sem desconto' => 'Sim, sem desconto',
    ];

    public const ACCOMMODATION_SELECT = [
        'Não Possui'        => 'Não Possui',
        'Sim, com desconto' => 'Sim, com desconto',
        'Sim, sem desconto' => 'Sim, sem desconto',
    ];

    public $table = 'third_party_registrations';

    protected $dates = [
        'date_start',
        'date_end',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'partner_id',
        'construction_id',
        'contract',
        'occupation_id',
        'date_start',
        'date_end',
        'accommodation',
        'food',
        'epi',
        'transport',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function partner()
    {
        return $this->belongsTo(BusinessPartner::class, 'partner_id');
    }

    public function construction()
    {
        return $this->belongsTo(Construction::class, 'construction_id');
    }

    public function occupation()
    {
        return $this->belongsTo(Occupation::class, 'occupation_id');
    }

    public function getDateStartAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateStartAttribute($value)
    {
        $this->attributes['date_start'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDateEndAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateEndAttribute($value)
    {
        $this->attributes['date_end'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
